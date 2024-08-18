<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('templates.app.layouts.app')] class extends Component
{
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
    <!-- Session Status -->
    <div>
        <!-- Placeholder for session status -->
        @if (session('status'))
            <div>
                <p style="color: green; font-size: 0.875rem;">{{ session('status') }}</p>
            </div>
        @endif
    </div>

    <form wire:submit.prevent="login">
        <!-- Email Address -->
        <div>
            <label for="email">Email</label>
            <input wire:model="form.email" id="email" type="email" name="email" required autofocus autocomplete="username">
            <div>
                <!-- Placeholder for input error message -->
                @error('form.email')
                    <p style="color: red; font-size: 0.875rem;">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Password -->
        <div>
            <label for="password">Password</label>
            <input wire:model="form.password" id="password" type="password" name="password" required autocomplete="current-password">
            <div>
                <!-- Placeholder for input error message -->
                @error('form.password')
                    <p style="color: red; font-size: 0.875rem;">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Remember Me -->
        <div>
            <label for="remember">
                <input wire:model="form.remember" id="remember" type="checkbox" name="remember">
                Remember me
            </label>
        </div>

        <div>
            <button type="submit">
                Log in
            </button>
        </div>
    </form>
</div>


