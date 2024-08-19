@extends($template)

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <div class="col-md-12 py-5 px-5 rounded shadow bg-light">
                <h1 class="mb-4 text-center">Edit Kategori</h1>
                <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Single Column Layout -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="{{ $kategori->nama_kategori }}" required>
                                <div class="invalid-feedback">Nama Kategori wajib diisi.</div>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi_kategori" class="form-label">Deskripsi Kategori</label>
                                <textarea name="deskripsi_kategori" id="deskripsi_kategori" class="form-control" rows="4">{{ $kategori->deskripsi_kategori }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                        <a href="{{ route('kategori.index') }}" class="btn btn-secondary ms-2"><i class="fas fa-arrow-left"></i> Kembali ke Daftar Kategori</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
