@extends($template)

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <div class="col-md-12 py-5 px-5 rounded shadow bg-light">
                <h1 class="mb-4 text-center">Daftar Kategori</h1>
                <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah
                    Kategori</a>
                <div class="table-responsive">
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
                                        <a href="{{ route('kategori.show', $kategori->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>
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
@endsection
