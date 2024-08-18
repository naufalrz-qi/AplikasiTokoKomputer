@extends($template)

@section('content')
<h1>Pesan Barang</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<div>
    <h2>{{ $barang->nama_barang }}</h2>
    <img src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}" style="width: 150px; height: 150px;">
    <p>Merek: {{ $barang->merek }}</p>
    <p>Harga: Rp {{ number_format($barang->harga, 2, ',', '.') }}</p>
    <p>{{ $barang->rincian_barang }}</p>

    <form action="{{ route('pembelian.store') }}" method="POST">
        @csrf
        <input type="hidden" name="id_barang" value="{{ $barang->id_barang }}">
        <input type="number" name="jumlah" min="1" value="1" required>
        <button type="submit">Pesan Sekarang</button>
    </form>
</div>
@endsection
