<nav class="navbar-nav ml-auto">
    @auth
        <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="btn btn-outline-light">Dashboard</a>
        </li>
    @else
        <li class="nav-item me-3">
            <a href="{{ route('login') }}" class="btn btn-outline-light">Log in</a>
        </li>

        @if (Route::has('register'))
            <li class="nav-item">
                <a href="{{ route('register') }}" class="btn btn-outline-light">Register</a>
            </li>
        @endif
    @endauth
</nav>
