@extends($template)

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>Receipt for Purchase #{{ $pembelian->id_beli }}</h2>
                </div>
                <div class="card-body">
                    <p><strong>Date:</strong> {{ $pembelian->tanggal }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($pembelian->status) }}</p>
                    <p><strong>Total Price:</strong> Rp{{ number_format($pembelian->total_harga_barang, 0, ',', '.') }}</p>

                    <h3 class="mt-4">Purchased Items</h3>
                    <ul>
                        @foreach ($pembelian->details as $detail)
                            <li>{{ $detail->barang->nama_barang }} - {{ $detail->jumlah }} pcs -
                                Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</li>
                        @endforeach
                    </ul>

                    @if ($pembelian->status === 'approved')
                        <div class="alert alert-success mt-3">
                            Payment was successful.
                        </div>
                    @elseif ($pembelian->status === 'rejected')
                        <div class="alert alert-danger mt-3">
                            Payment failed.
                        </div>
                    @elseif($pembelian->status === 'pending')
                        <div class="alert alert-warning mt-3">
                            Payment is pending.
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('payment.index', $pembelian->id_beli) }}" class="btn text-white"
                                style="background: linear-gradient(135deg, #6a11cb, #2575fc);">
                                Lanjutkan ke Pembayaran
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
