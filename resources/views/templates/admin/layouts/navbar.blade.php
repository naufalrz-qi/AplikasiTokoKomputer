<nav class="flex-column mt-4">
    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center my-2">
        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
    </a>
    <a href="{{ route('kategori.index') }}" class="d-flex align-items-center my-2">
        <i class="fas fa-tags me-2"></i> Kelola Kategori
    </a>
    <a href="{{ route('barang.index') }}" class="d-flex align-items-center my-2">
        <i class="fas fa-box-open me-2"></i> Kelola Barang
    </a>
    <a href="{{ route('admin.pembelian.index') }}" class="d-flex align-items-center my-2">
        <i class="fas fa-box-open me-2"></i> Daftar Transaksi
    </a>
    {{-- <a href="{{ route('pembelian.index') }}" class="d-flex align-items-center my-2 text-dark">
            <i class="fas fa-shopping-cart me-2"></i> Kelola Pembelian
        </a> --}}
    {{-- <a href="{{ route('admin.users.index') }}" class="d-flex align-items-center my-2 text-dark">
            <i class="fas fa-users-cog me-2"></i> Kelola Pengguna
        </a> --}}
    {{-- <a href="#" class="d-flex align-items-center my-2 btn-none"> --}}
    @livewire('logout-button')
    {{-- </a> --}}
</nav>
