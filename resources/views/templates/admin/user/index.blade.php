@extends($template)

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <div
                style="background-image: url('{{ asset('assets/img/back-again.png') }}'); background-size: 38%; background-repeat: no-repeat; background-position: 0px -120px; ">
                <div
                    style="background-image: url('{{ asset('assets/img/back-again.png') }}'); background-size: 38%; background-repeat: no-repeat; background-position: 100% 300px; ">
                    <div class="col-md-12 py-5 px-5 rounded shadow">
                        <h1 class="mb-4 text-center">Daftar Pengguna</h1>
                        {{-- <a href="" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah
                            Pengguna</a> --}}
                        <div class="table-responsive text-center">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nomor HP</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->alamat }}</td>
                                            <td>{{ $user->jenis_kelamin ?? '-' }}</td>
                                            <td>{{ $user->nomor_hp }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                                    style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
