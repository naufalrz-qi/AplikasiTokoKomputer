@extends($template)

@section('content')
<h1>Tambah Barang</h1>
    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>ID Barang:</label><br>
        <input type="text" name="id_barang" required><br>

        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" required><br>

        <label>Merek:</label><br>
        <input type="text" name="merek" required><br>

        <label>Gambar:</label><br>
        <input type="file" name="gambar" required><br>

        <label>Rincian Barang:</label><br>
        <textarea name="rincian_barang"></textarea><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" required><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" required><br>

        <label>Kategori:</label><br>
        <select name="kategori_id" required>
            <option value="">Pilih Kategori</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('barang.index') }}">Kembali ke Daftar Barang</a>
@endsection
