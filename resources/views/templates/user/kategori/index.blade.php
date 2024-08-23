@extends($template)

@section('content')
    <div>
        <div
            style="background-image: url('{{ asset('assets/img/back-again.png') }}'); background-size: 38%; background-repeat: no-repeat; background-position: -50%;">
            <div
                style="background-image: url('{{ asset('assets/img/back-again-2.png') }}'); background-size: 38%; background-repeat: no-repeat; background-position: 150%;">
                <div class="container py-4">
                    <!-- Dropdown untuk filter kategori -->
                    <form method="GET" action="{{ route('user.kategori.index') }}">
                        <div class="mb-4">
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white border-0" id="kategori-addon">
                                    <i class="fas fa-filter"></i> <!-- Icon filter -->
                                </span>
                                <select name="kategori" class="form-select border-1 shadow-sm" aria-label="Kategori"
                                    aria-describedby="kategori-addon" onchange="this.form.submit()">
                                    <option value=""> Cari berdasarkan Kategori </option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                                            {{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>

                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($barangs as $barang)
                            <div class="col">
                                <div class="card h-100 shadow-lg border-0">
                                    <img src="{{ asset($barang->gambar) }}" class="card-img-top rounded-top"
                                        alt="{{ $barang->nama_barang }}" style="object-fit: cover; height: 200px;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                                        <p class="card-text text-success fw-bold">Rp
                                            {{ number_format($barang->harga, 2, ',', '.') }}</p>
                                        <p class="text-muted small">{{ $barang->merek }}</p>
                                        <p class="text-muted">{{ Str::limit($barang->rincian_barang, 100) }}</p>
                                    </div>
                                    <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
                                        <a href="{{ route('barang.show', $barang->id_barang) }}"
                                            class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                                        <a href="{{ route('keranjang.create', $barang->id_barang) }}"
                                            class="btn btn-primary btn-sm"
                                            style="background: linear-gradient(135deg, #6a11cb, #2575fc);">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
