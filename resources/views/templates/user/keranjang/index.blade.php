@extends($template)

@section('content')
<h1>Keranjang Belanja</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@if($keranjangItems->isEmpty())
    <p>Keranjang kamu kosong.</p>
@else
    <ul>
        @foreach($keranjangItems as $item)
            <li>
                <img src="{{ asset($item->barang->gambar) }}" alt="{{ $item->barang->nama_barang }}" style="width: 50px; height: 50px;">
                <strong>{{ $item->barang->nama_barang }}</strong>
                <p>Rp {{ number_format($item->barang->harga, 2, ',', '.') }}</p>

                <!-- Input untuk memperbarui jumlah -->
                <input type="number" value="{{ $item->jumlah }}" min="1" style="width: 50px;" onchange="updateQuantity({{ $item->id }}, this.value)">

                <!-- Tombol untuk menghapus barang -->
                <form action="{{ route('keranjang.destroy', $item->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>

    @if(!$keranjangItems->isEmpty())
    <a href="{{ route('keranjang.checkout') }}" class="btn btn-primary">Lanjutkan ke Checkout</a>
@endif

@endif

<!-- Script untuk AJAX -->
<script>
function updateQuantity(itemId, quantity) {
    fetch(`/keranjang/update/${itemId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({ jumlah: quantity })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log(data.message);
             // Anda bisa menggantinya dengan UI feedback lainnya
        } else {
            alert('Terjadi kesalahan saat memperbarui jumlah barang.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan pada server.');
    });
}
</script>
@endsection
