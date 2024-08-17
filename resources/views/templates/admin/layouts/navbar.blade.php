
<header>
    <nav>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('barang.index') }}">Kelola Barang</a></li>
            <li><a href="{{ route('kategori.index') }}">Kelola Kategori</a></li>
            {{-- <li><a href="{{ route('pembelian.index') }}">Kelola Pembelian</a></li> --}}
            {{-- <li><a href="{{ route('admin.users.index') }}">Kelola Pengguna</a></li> --}}
            <li>

                @livewire('logout-button')

            </li>
        </ul>
    </nav>
</header>
