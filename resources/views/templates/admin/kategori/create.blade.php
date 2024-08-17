@extends($template)

@section('content')
<h1>Tambah Kategori</h1>
<form action="{{ route('kategori.store') }}" method="POST">
    @csrf
    <label>Nama Kategori:</label><br>
    <input type="text" name="nama_kategori" required><br>

    <label>Deskripsi Kategori:</label><br>
    <textarea name="deskripsi_kategori"></textarea><br><br>

    <button type="submit">Simpan</button>
</form>
<a href="{{ route('kategori.index') }}">Kembali ke Daftar Kategori</a>
@endsection
