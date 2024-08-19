@extends($template)

@section('content')
    <div>
        <h1 class="mt-4 text-center">Keranjang Belanja</h1>
        <div
            style="background-image: url('{{ asset('assets/img/back-again.png') }}'); background-size: 38%; background-repeat: no-repeat; background-position: -50%; ">
            <div
                style="background-image: url('{{ asset('assets/img/back-again-2.png') }}'); background-size: 39%; background-repeat: no-repeat; background-position: 150%;">
                <div class="container py-4">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($keranjangItems->isEmpty())
                        <div class="alert alert-info">
                            Keranjang kamu kosong.
                        </div>
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col" class="text-end">Total</th>
                                    <th scope="col" class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach (range(1, 5) as $i)
                                        <td class="py-5">
                                            <div class="d-flex align-items-center">
                                                <!-- Konten -->
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col" class="text-end">Total</th>
                                        <th scope="col" class="text-end">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keranjangItems as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset($item->barang->gambar) }}"
                                                        alt="{{ $item->barang->nama_barang }}" class="img-fluid"
                                                        style="width: 70px; height: 70px; object-fit: cover;">
                                                    <div class="ms-3">
                                                        <strong>{{ $item->barang->nama_barang }}</strong>
                                                        <p class="text-muted">{{ $item->barang->merek }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Rp {{ number_format($item->barang->harga, 2, ',', '.') }}</td>
                                            <td>
                                                <input type="number" value="{{ $item->jumlah }}" min="1"
                                                    class="form-control" style="width: 70px;"
                                                    onchange="updateQuantity({{ $item->id }}, this.value)">
                                            </td>
                                            <td class="text-end">Rp
                                                {{ number_format($item->barang->harga * $item->jumlah, 2, ',', '.') }}</td>
                                            <td class="text-end">
                                                <form action="{{ route('keranjang.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash-alt"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('keranjang.checkout') }}" class="btn text-white"
                                style="background: linear-gradient(135deg, #6a11cb, #2575fc);">
                                Lanjutkan ke Checkout
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <!-- Script untuk AJAX -->
    <script>
        function updateQuantity(itemId, quantity) {
            fetch(`/keranjang/update/${itemId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        jumlah: quantity
                    })
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
