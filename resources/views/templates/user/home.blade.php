@extends($template)

@section('content')
    <div class="container py-4">
        <h1 class="mb-4 text-center">Daftar Barang</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($barangs as $barang)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset($barang->gambar) }}" class="card-img-top rounded-top"
                            alt="{{ $barang->nama_barang }}" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                            <p class="card-text text-success fw-bold">Rp {{ number_format($barang->harga, 2, ',', '.') }}
                            </p>
                            <p class="text-muted small">{{ $barang->merek }}</p>
                            <p class="text-muted">{{ Str::limit($barang->rincian_barang, 100) }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
                            <a href="{{ route('barang.show', $barang->id_barang) }}"
                                class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                            <a href="{{ route('keranjang.create', $barang->id_barang) }}" class="btn btn-primary btn-sm"> <i
                                    class="fas fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
