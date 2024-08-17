<header>
    <nav>
        <ul>
            <li><a href="/#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#">Barang</a></li>
            <li><a href="#">Kategori</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <li>

                @if (Route::has('login'))
                    <livewire:welcome.navigation />
                @endif

            </li>
        </ul>
    </nav>
</header>
