@extends($template)

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <div
                style="background-image: url('{{ asset('assets/img/back-again.png') }}'); background-size: 38%; background-repeat: no-repeat; background-position: 0px -120px; ">
                <div
                    style="background-image: url('{{ asset('assets/img/back-again.png') }}'); background-size: 38%; background-repeat: no-repeat; background-position: 100% 300px; ">
                    <div class="col-md-12 py-5 px-5 rounded shadow">
                        <h1 class="mb-4 text-center">Daftar Pembelian</h1>
                        <div class="table-responsive text-center">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Pembelian</th>
                                        <th>Tanggal</th>
                                        <th>Nama Pengguna</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        <th>Detail Pembelian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pembelians as $key => $pembelian)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $pembelian->id_beli }}</td>
                                            <td>{{ $pembelian->tanggal }}</td>
                                            <td>{{ $pembelian->user->name }}</td>
                                            <td>Rp{{ number_format($pembelian->total_harga_barang, 0, ',', '.') }}</td>
                                            <td>{{ $pembelian->status }}</td>
                                            <td>
                                                <button class="btn btn-info btn-sm" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#detail-{{ $pembelian->id_beli }}">
                                                    Lihat Detail
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <div class="collapse" id="detail-{{ $pembelian->id_beli }}">
                                                    <div class="card card-body">
                                                        <h5>Detail Pembelian</h5>
                                                        <table class="table table-bordered mt-3">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th>No.</th>
                                                                    <th>Nama Barang</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Subtotal</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($pembelian->details as $key => $detail)
                                                                    <tr>
                                                                        <td>{{ $key + 1 }}</td>
                                                                        <td>{{ $detail->barang->nama_barang }}</td>
                                                                        <td>{{ $detail->jumlah }}</td>
                                                                        <td>Rp{{ number_format($detail->subtotal, 0, ',', '.') }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
