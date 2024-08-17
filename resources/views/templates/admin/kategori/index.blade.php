@extends($template)

@section('content')
<h1>Daftar Kategori</h1>
<a href="{{ route('kategori.create') }}">Tambah Kategori</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kategoris as $kategori)
        <tr>
            <td>{{ $kategori->id }}</td>
            <td>{{ $kategori->nama_kategori }}</td>
            <td>{{ $kategori->deskripsi_kategori }}</td>
            <td>
                <a href="{{ route('kategori.show', $kategori->id) }}">Lihat</a>
                <a href="{{ route('kategori.edit', $kategori->id) }}">Edit</a>
                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
