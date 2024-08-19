@extends($template)

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <div class="product-image">
                    <img src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}"
                        class="img-fluid rounded shadow-lg">
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="h2 font-weight-bold text-dark">{{ $barang->nama_barang }}</h1>
                <p class="text-muted">{{ $barang->merek }}</p>
                <h2 class="text-success font-weight-bold">Rp {{ number_format($barang->harga, 2, ',', '.') }}</h2>
                <p class="text-muted mb-4">Stok: {{ $barang->stok }}</p>
                <p>{{ $barang->rincian_barang }}</p>
                <p class="text-muted">Kategori: <span class="text-dark">{{ $barang->kategori->nama_kategori }}</span></p>

                <a href="{{ route('keranjang.create', $barang->id_barang) }}" class="btn btn-primary btn-lg mt-3 btn-sm">
                    <i class="fas fa-shopping-cart"></i> Tambahkan ke Keranjang
                </a>
                <a href="{{ route('user.home') }}" class="btn btn-outline-secondary btn-lg mt-3 btn-sm">Kembali</a>
            </div>
        </div>
    </div>
@endsection

<style>
    .product-image img {
        width: 100%;
        height: auto;
        transition: transform 0.3s ease-in-out;
    }

    .product-image img:hover {
        transform: scale(1.05);
    }
</style>
