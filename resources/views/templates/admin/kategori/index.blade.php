@extends($template)

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <div
                style="background-image: url('{{ asset('assets/img/back-again.png') }}'); background-size: 38%; background-repeat: no-repeat; background-position: 0px -120px; ">
                <div
                    style="background-image: url('{{ asset('assets/img/back-again.png') }}'); background-size: 38%; background-repeat: no-repeat; background-position: 100% 300px; ">
                    <div class="col-md-12 py-5 px-5 rounded shadow">
                        <h1 class="mb-4 text-center">Daftar Barang</h1>
                        <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i>
                            Tambah
                            Barang</a>
                        <div class="table-responsive text-center">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoris as $kategori)
                                        <tr>
                                            <td>{{ $kategori->id }}</td>
                                            <td>{{ $kategori->nama_kategori }}</td>
                                            <td>{{ $kategori->deskripsi_kategori }}</td>
                                            <td>
                                                <a href="{{ route('kategori.edit', $kategori->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
                                                    style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
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
