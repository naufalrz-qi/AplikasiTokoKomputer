@extends($template)

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <div class="col-md-12 py-5 px-5 rounded shadow">
                <h1 class="mb-4 text-center">Edit Barang</h1>
                <form action="{{ route('barang.update', $barang->id_barang) }}" method="POST" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                                    value="{{ $barang->nama_barang }}" required>
                                <div class="invalid-feedback">Nama Barang wajib diisi.</div>
                            </div>

                            <div class="mb-3">
                                <label for="merek" class="form-label">Merek</label>
                                <input type="text" name="merek" id="merek" class="form-control"
                                    value="{{ $barang->merek }}" required>
                                <div class="invalid-feedback">Merek wajib diisi.</div>
                            </div>

                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control"
                                    value="{{ $barang->harga }}" required>
                                <div class="invalid-feedback">Harga wajib diisi.</div>
                            </div>

                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" name="stok" id="stok" class="form-control"
                                    value="{{ $barang->stok }}" required>
                                <div class="invalid-feedback">Stok wajib diisi.</div>
                            </div>
                            <div class="mb-3">
                                <label for="kategori_id" class="form-label">Kategori</label>
                                <select name="kategori_id" id="kategori_id" class="form-select" required>
                                    <option value="" disabled>Pilih Kategori</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            {{ $barang->kategori_id == $kategori->id ? 'selected' : '' }}>
                                            {{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Pilih salah satu kategori.</div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label><br>
                                @if ($barang->gambar)
                                    <img src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}"
                                        class="img-thumbnail mb-2" width="100"><br>
                                @endif
                                <input type="file" name="gambar" id="gambar" class="form-control">
                                <div class="invalid-feedback">Silakan unggah gambar baru jika diperlukan.</div>
                            </div>

                            <div class="mb-3">
                                <label for="rincian_barang" class="form-label">Rincian Barang</label>
                                <textarea name="rincian_barang" id="rincian_barang" class="form-control" rows="7">{{ $barang->rincian_barang }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                        <a href="{{ route('barang.index') }}" class="btn btn-secondary ms-2"><i
                                class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
