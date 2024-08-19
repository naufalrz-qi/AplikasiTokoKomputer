@extends($template)

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <div
                style="background-image: url('{{ asset('assets/img/back-again.png') }}'); background-size: 38%; background-repeat: no-repeat; background-position: 0px -120px; ">
                <div
                    style="background-image: url('{{ asset('assets/img/back-again.png') }}'); background-size: 38%; background-repeat: no-repeat; background-position: 100% 300px; ">
                    <div class="col-md-12 py-5 px-5 rounded shadow">
                        <h1 class="mb-4 text-center">Tambah Barang</h1>
                        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data"
                            class="needs-validation" novalidate>
                            @csrf
                            <div class="row">
                                <!-- Left Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="id_barang" class="form-label">ID Barang</label>
                                        <input type="text" name="id_barang" id="id_barang" class="form-control" required>
                                        <div class="invalid-feedback">ID Barang wajib diisi.</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                        <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                                            required>
                                        <div class="invalid-feedback">Nama Barang wajib diisi.</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="merek" class="form-label">Merek</label>
                                        <input type="text" name="merek" id="merek" class="form-control" required>
                                        <div class="invalid-feedback">Merek wajib diisi.</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="harga" class="form-label">Harga</label>
                                        <input type="number" name="harga" id="harga" class="form-control" required>
                                        <div class="invalid-feedback">Harga wajib diisi.</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="stok" class="form-label">Stok</label>
                                        <input type="number" name="stok" id="stok" class="form-control" required>
                                        <div class="invalid-feedback">Stok wajib diisi.</div>
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="kategori_id" class="form-label">Kategori</label>
                                        <select name="kategori_id" id="kategori_id" class="form-select" required>
                                            <option value="" selected disabled>Pilih Kategori</option>
                                            @foreach ($kategoris as $kategori)
                                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Pilih salah satu kategori.</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="gambar" class="form-label">Gambar</label>
                                        <input type="file" name="gambar" id="gambar" class="form-control" required>
                                        <div class="invalid-feedback">Gambar wajib diunggah.</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="rincian_barang" class="form-label">Rincian Barang</label>
                                        <textarea name="rincian_barang" id="rincian_barang" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{ route('barang.index') }}" class="btn btn-secondary ms-2"><i
                                        class="fas fa-arrow-left"></i> Kembali ke Daftar Barang</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
