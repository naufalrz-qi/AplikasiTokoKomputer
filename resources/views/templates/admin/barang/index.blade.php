@extends($template)

@section('content')
            <div class="container-fluid d-flex justify-content-center align-items-center">
                <div class="row w-100">
                    <div class="col-md-12 py-5 px-5 rounded shadow">
                        <h1 class="mb-4 text-center">Daftar Barang</h1>
                        <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah
                            Barang</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Merek</th>
                                        <th>Gambar</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barangs as $barang)
                                        <tr>
                                            <td>{{ $barang->id_barang }}</td>
                                            <td>{{ $barang->nama_barang }}</td>
                                            <td>{{ $barang->merek }}</td>
                                            <td>
                                                <img src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}"
                                                    class="img-thumbnail" width="50">
                                            </td>
                                            <td>{{ number_format($barang->harga, 0, ',', '.') }}</td>
                                            <td>{{ $barang->stok }}</td>
                                            <td>
                                                <a href="{{ route('barang.show', $barang->id_barang) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i> Lihat
                                                </a>
                                                <a href="{{ route('barang.edit', $barang->id_barang) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('barang.destroy', $barang->id_barang) }}"
                                                    method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
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
