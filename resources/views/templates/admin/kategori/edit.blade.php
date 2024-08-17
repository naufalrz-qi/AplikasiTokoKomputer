@extends($template)

@section('content')
<h1>Edit Kategori</h1>
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Kategori:</label><br>
        <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}" required><br>

        <label>Deskripsi Kategori:</label><br>
        <textarea name="deskripsi_kategori">{{ $kategori->deskripsi_kategori }}</textarea><br><br>

        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('kategori.index') }}">Kembali ke Daftar Kategori</a>
@endsection
