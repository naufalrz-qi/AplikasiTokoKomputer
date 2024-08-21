@extends($template)

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-lg">
                    <div class="card-header text-white text-center"
                        style="background: linear-gradient(135deg, #6a11cb, #2575fc);">
                        <h2 class="mb-0">Receipt for Purchase #{{ $pembelian->id_beli }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p><strong>Date:</strong> {{ $pembelian->tanggal }}</p>
                            <p><strong>Status:</strong>
                                <span class="badge bg-info text-uppercase">{{ ucfirst($pembelian->status) }}</span>
                            </p>
                        </div>
                        <p><strong>Total Price:</strong>
                            <span
                                class="text-success">Rp{{ number_format($pembelian->total_harga_barang, 0, ',', '.') }}</span>
                        </p>

                        <h3 class="mt-4">Purchased Items</h3>
                        <ul class="list-group">
                            @foreach ($pembelian->details as $detail)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $detail->barang->nama_barang }} - {{ $detail->jumlah }} pcs
                                    <span>Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</span>
                                </li>
                            @endforeach
                        </ul>

                        @if ($pembelian->status === 'approved')
                            <div class="alert alert-success mt-3 text-center">
                                <i class="fas fa-check-circle"></i> Payment was successful.
                            </div>
                        @elseif ($pembelian->status === 'rejected')
                            <div class="alert alert-danger mt-3 text-center">
                                <i class="fas fa-times-circle"></i> Payment failed.
                            </div>
                        @elseif($pembelian->status === 'pending')
                            <div class="alert alert-warning mt-3 text-center">
                                <i class="fas fa-exclamation-circle"></i> Payment is pending.
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ route('payment.index', $pembelian->id_beli) }}"
                                    class="btn btn-primary btn-xl text-white"
                                    style="background: linear-gradient(135deg, #6a11cb, #2575fc);">
                                    <i class="fas fa-credit-card"></i> Lanjutkan ke Pembayaran
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
