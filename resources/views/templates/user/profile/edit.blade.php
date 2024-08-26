@extends($template)

@section('content')
    <div>
        <div
            style="background-image: url('{{ asset('assets/img/back-again.png') }}'); background-size: 38%; background-repeat: no-repeat; background-position: -50%;">
            <div
                style="background-image: url('{{ asset('assets/img/back-again-2.png') }}'); background-size: 38%; background-repeat: no-repeat; background-position: 150%;">
                <div class="container-fluid d-flex justify-content-center align-items-center my-5">
                    <div class="col-md-8 mx-auto py-5 px-5 rounded shadow">
                        <h1 class="mb-4 text-center">Edit Profil Pengguna</h1>
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ $user->username }}">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ $user->alamat }}">
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                    value="{{ $user->jenis_kelamin }}">
                            </div>
                            <div class="mb-3">
                                <label for="nomor_hp" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp"
                                    value="{{ $user->nomor_hp }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
