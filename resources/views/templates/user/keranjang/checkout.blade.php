@extends($template)

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Checkout</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($keranjangItems->isEmpty())
            <div class="alert alert-info">Keranjang kamu kosong.</div>
        @else
            <form action="{{ route('pembelian.store') }}" method="POST">
                @csrf
                <div class="table-responsive mb-4">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keranjangItems as $item)
                                <tr>
                                    <td class="d-flex align-items-center">
                                        <img src="{{ asset($item->barang->gambar) }}" alt="{{ $item->barang->nama_barang }}"
                                            class="img-thumbnail me-3" style="width: 50px; height: 50px;">
                                        <strong>{{ $item->barang->nama_barang }}</strong>
                                    </td>
                                    <td>Rp {{ number_format($item->barang->harga, 2, ',', '.') }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>Rp {{ number_format($item->barang->harga * $item->jumlah, 2, ',', '.') }}</td>
                                    <input type="hidden" name="barang_id[]" value="{{ $item->id_barang }}">
                                    <input type="hidden" name="jumlah[]" value="{{ $item->jumlah }}">
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-end">Total Keseluruhan:</th>
                                <th>Rp
                                    {{ number_format($keranjangItems->sum(function ($item) {return $item->barang->harga * $item->jumlah;}),2,',','.') }}
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg w-50 shadow-sm">Lanjutkan Pembelian</button>
                </div>
            </form>
        @endif
    </div>
@endsection

<style>
    .img-thumbnail {
        border: none;
        padding: 0;
        border-radius: 8px;
    }

    .table {
        border-collapse: separate;
        border-spacing: 0 15px;
    }

    .table th,
    .table td {
        vertical-align: middle;
        background-color: #f8f9fa;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f3f5;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .btn-lg {
        padding: 10px 20px;
        font-size: 1.25rem;
    }

    .alert {
        border-radius: 5px;
    }
</style>
