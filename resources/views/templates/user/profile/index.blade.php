@extends($template)

@section('content')
    <div>
        <div
            style="background-image: url('{{ asset('assets/img/back-again.png') }}'); background-size: 38%; background-repeat: no-repeat; background-position: -50%;">
            <div
                style="background-image: url('{{ asset('assets/img/back-again-2.png') }}'); background-size: 38%; background-repeat: no-repeat; background-position: 150%;">
                <div class="container-fluid d-flex justify-content-center align-items-center my-5">
                    <div class="col-md-8 mx-auto py-5 px-5 rounded shadow">
                        <h1 class="mb-4 text-center">Profil Pengguna</h1>
                        <div class="card">
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>Username:</strong> {{ $user->username }}</li>
                                    <li class="list-group-item"><strong>Nama:</strong> {{ $user->name }}</li>
                                    <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                                    <li class="list-group-item"><strong>Alamat:</strong> {{ $user->alamat }}</li>
                                    <li class="list-group-item"><strong>Jenis Kelamin:</strong>
                                        {{ $user->jenis_kelamin ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Nomor HP:</strong> {{ $user->nomor_hp }}</li>
                                    <li class="list-group-item">
                                        <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
