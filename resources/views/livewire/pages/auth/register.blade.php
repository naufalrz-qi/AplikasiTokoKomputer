<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('templates.app.layouts.app')] class extends Component {
    public string $username = '';
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public ?string $alamat = '';
    public ?string $jenis_kelamin = '';
    public ?string $nomor_hp = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'alamat' => ['nullable', 'string', 'max:255'],
            'jenis_kelamin' => ['nullable', 'string', 'in:Pria,Wanita'],
            'nomor_hp' => ['nullable', 'string', 'max:15'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        event(new Registered($user));

        Auth::login($user);

        $this->redirect('/home', navigate: true);
    }
};
?>

<div>

    <div>
        <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center"
            style="background-image: url('{{ asset('assets/img/back-again.png') }}'); background-size: 40%; background-repeat: no-repeat; background-position: -50%; ">

            <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center"
                style="background-image: url('{{ asset('assets/img/back-again-2.png') }}'); background-size: 40%; background-repeat: no-repeat; background-position: 150%;">

                <div class="container d-flex align-items-center justify-content-center min-vh-100 my-5">
                    <div class="card shadow-sm p-4" style="max-width: 100%; max-width: 500px;">
                        <img src="{{ asset('assets/img/vector-login-3.png') }}" alt="Login Illustration"
                            class="img-fluid mx-auto d-block" style="max-width: 60%; height: auto;">
                        <div class="card-body">
                            <h4 class="card-title mb-4 text-center">Register</h4>
                            <form wire:submit.prevent="register">
                                <!-- Username -->
                                <div class="mb-3">
                                    <label for="username" class="form-label">{{ __('Username') }}</label>
                                    <input wire:model="username" id="username" class="form-control" type="text"
                                        name="username" required autofocus autocomplete="username">
                                    @error('username')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input wire:model="name" id="name" class="form-control" type="text"
                                        name="name" required autofocus autocomplete="name">
                                    @error('name')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email Address -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input wire:model="email" id="email" class="form-control" type="email"
                                        name="email" required autocomplete="username">
                                    @error('email')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input wire:model="password" id="password" class="form-control" type="password"
                                        name="password" required autocomplete="new-password">
                                    @error('password')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-3">
                                    <label for="password_confirmation"
                                        class="form-label">{{ __('Confirm Password') }}</label>
                                    <input wire:model="password_confirmation" id="password_confirmation"
                                        class="form-control" type="password" name="password_confirmation" required
                                        autocomplete="new-password">
                                    @error('password_confirmation')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Alamat -->
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">{{ __('Alamat') }}</label>
                                    <input wire:model="alamat" id="alamat" class="form-control" type="text"
                                        name="alamat">
                                    @error('alamat')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">{{ __('Jenis Kelamin') }}</label>
                                    <select wire:model="jenis_kelamin" id="jenis_kelamin" class="form-select"
                                        name="jenis_kelamin">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Nomor HP -->
                                <div class="mb-3">
                                    <label for="nomor_hp" class="form-label">{{ __('Nomor HP') }}</label>
                                    <input wire:model="nomor_hp" id="nomor_hp" class="form-control" type="text"
                                        name="nomor_hp">
                                    @error('nomor_hp')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-end mt-4">
                                    <a class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none me-4"
                                        href="{{ route('login') }}" wire:navigate>
                                        {{ __('Already registered?') }}
                                    </a>
                                    <button type="submit" class="btn text-white"
                                        style="background: linear-gradient(135deg, #6a11cb, #2575fc);">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
