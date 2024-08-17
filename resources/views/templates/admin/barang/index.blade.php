@extends($template)

@section('content')
<h1>Daftar Barang</h1>
<a href="{{ route('barang.create') }}">Tambah Barang</a>
<table border="1">
    <thead>
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
        @foreach($barangs as $barang)
        <tr>
            <td>{{ $barang->id_barang }}</td>
            <td>{{ $barang->nama_barang }}</td>
            <td>{{ $barang->merek }}</td>
            <td><img src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}" width="50"></td>
            <td>{{ $barang->harga }}</td>
            <td>{{ $barang->stok }}</td>
            <td>
                <a href="{{ route('barang.show', $barang->id_barang) }}">Lihat</a>
                <a href="{{ route('barang.edit', $barang->id_barang) }}">Edit</a>
                <form action="{{ route('barang.destroy', $barang->id_barang) }}" method="POST" style="display:inline;">
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
