@extends($template)

@section('content')
<h1>Detail Barang</h1>
    <p><strong>ID Barang:</strong> {{ $barang->id_barang }}</p>
    <p><strong>Nama Barang:</strong> {{ $barang->nama_barang }}</p>
    <p><strong>Merek:</strong> {{ $barang->merek }}</p>
    <p><strong>Gambar:</strong><br><img src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}" width="150"></p>
    <p><strong>Rincian Barang:</strong> {{ $barang->rincian_barang }}</p>
    <p><strong>Harga:</strong> {{ $barang->harga }}</p>
    <p><strong>Stok:</strong> {{ $barang->stok }}</p>
    <p><strong>Kategori ID:</strong> {{ $barang->kategori->nama_kategori }}</p>
    <a href="{{ route('user.home') }}">Kembali</a>

@endsection
