@extends($template)

@section('content')
<h1>Checkout</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@if($keranjangItems->isEmpty())
    <p>Keranjang kamu kosong.</p>
@else
    <form action="{{ route('pembelian.store') }}" method="POST">
        @csrf
        <ul>
            @foreach($keranjangItems as $item)
                <li>
                    <img src="{{ asset($item->barang->gambar) }}" alt="{{ $item->barang->nama_barang }}" style="width: 50px; height: 50px;">
                    <strong>{{ $item->barang->nama_barang }}</strong>
                    <p>Rp {{ number_format($item->barang->harga, 2, ',', '.') }}</p>
                    <input type="hidden" name="barang_id[]" value="{{ $item->id_barang }}">
                    <input type="hidden" name="jumlah[]" value="{{ $item->jumlah }}">
                </li>
            @endforeach
        </ul>
        <button type="submit">Lanjutkan Pembelian</button>
    </form>
@endif
@endsection
