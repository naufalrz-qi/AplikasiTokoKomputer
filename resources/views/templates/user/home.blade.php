@extends($template)

@section('content')
    <h1>Daftar Barang</h1>

    <div class="product-container">
        @foreach ($barangs as $barang)
            <div class="product-card">
                <img src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}" class="product-image">
                <h2 class="product-name">{{ $barang->nama_barang }}</h2>
                <p class="product-brand">{{ $barang->merek }}</p>
                <p class="product-price">Rp {{ number_format($barang->harga, 2, ',', '.') }}</p>
                <p class="product-details">{{ Str::limit($barang->rincian_barang, 100) }}</p>
                <a href="{{ route('barang.show', $barang->id_barang) }}" class="product-link">Lihat Detail</a>
            </div>
        @endforeach
    </div>
@endsection
