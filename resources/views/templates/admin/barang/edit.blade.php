@extends($template)


@section('content')
<h1>Edit Barang</h1>
    <form action="{{ route('barang.update', $barang->id_barang) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" required><br>

        <label>Merek:</label><br>
        <input type="text" name="merek" value="{{ $barang->merek }}" required><br>

        <label>Gambar:</label><br>
        @if($barang->gambar)
            <p>Gambar Saat Ini:</p>
            <img src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}" width="100"><br>
        @endif
        <input type="file" name="gambar"><br>

        <label>Rincian Barang:</label><br>
        <textarea name="rincian_barang">{{ $barang->rincian_barang }}</textarea><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" value="{{ $barang->harga }}" required><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" value="{{ $barang->stok }}" required><br>

        <label>Kategori:</label><br>
        <select name="kategori_id" required>
            <option value="">Pilih Kategori</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ $barang->kategori_id == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select><br><br>

        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('barang.index') }}">Kembali ke Daftar Barang</a>
@endsection
