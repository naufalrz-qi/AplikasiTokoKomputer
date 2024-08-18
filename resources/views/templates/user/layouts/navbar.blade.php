<header>
    <nav>
        <ul>
            <li><a href="{{ route('user.home') }}">Home</a></li>
            <li><a href="{{ route('keranjang.index') }}">Keranjang</a></li>
            <li>

                @livewire('logout-button')

            </li>
        </ul>
    </nav>
</header>
