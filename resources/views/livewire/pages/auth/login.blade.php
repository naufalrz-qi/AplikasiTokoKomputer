<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('templates.app.layouts.app')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();
        $user = auth()->user();
        $url = '';

        if ($user->role === 'admin') {
            $url = '/admin/dashboard';
        } elseif ($user->role === 'user') {
            $url = '/home';
        } else {
            $url = '/'; // URL default jika tidak ada role yang sesuai
        }

        $this->redirectIntended($url);
    }
};

?>

<div>

    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center"
        style="background-image: url('{{ asset('assets/img/back-login.png') }}'); background-size: 60%; background-repeat: no-repeat; background-position: center;">

        <div class="card shadow p-4" style="width: 100%; max-width: 500px; background-color: rgba(255, 255, 255, 1);">
            <img src="{{ asset('assets/img/vector-login-3.png') }}" alt="Login Illustration"
                class="img-fluid mx-auto d-block" style="max-width: 60%; height: auto;">
            <div class="card-body">
                <h4 class="card-title mb-4 text-center">Log in</h4>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form wire:submit.prevent="login">
                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input wire:model="form.email" id="email" type="email" name="email" class="form-control"
                            required autofocus autocomplete="username">
                        @error('form.email')
                            <div class="form-text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input wire:model="form.password" id="password" type="password" name="password"
                            class="form-control" required autocomplete="current-password">
                        @error('form.password')
                            <div class="form-text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check mb-4">
                        <input wire:model="form.remember" id="remember" type="checkbox" name="remember"
                            class="form-check-input">
                        <label for="remember" class="form-check-label">Remember me</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-info">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>
