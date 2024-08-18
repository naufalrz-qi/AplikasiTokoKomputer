<nav class="navbar-nav ml-auto">
    @auth
        <li class="nav-item">
            <a href="{{ url('/dashboard') }}"
                class="nav-link text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                Dashboard
            </a>
        </li>
    @else
        <li class="nav-item">
            <a href="{{ route('login') }}"
                class="nav-link text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                Log in
            </a>
        </li>

        @if (Route::has('register'))
            <li class="nav-item">
                <a href="{{ route('register') }}"
                    class="nav-link text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Register
                </a>
            </li>
        @endif
    @endauth
</nav>
