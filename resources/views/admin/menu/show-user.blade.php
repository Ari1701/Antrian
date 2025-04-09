@extends('admin.layouts.app')

@section('title', 'User') 

@section('content') 
<div class="container mt-4">
    <h2 class="mb-4">Daftar Pengguna</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tgl Lahir</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>No KTP</th>
                    <th>No HP</th>
                    <th>Pekerjaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ \Carbon\Carbon::parse($user->tgl_lahir)->locale('id')->translatedFormat('j F Y') }}</td>
                    <td>{{ $user->alamat }}</td>
                    <td>{{ ucfirst($user->jenis_kelamin) }}</td>
                    <td>{{ $user->no_ktp }}</td>
                    <td>{{ $user->no_hp }}</td>
                    <td>{{ $user->pekerjaan }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('admin.menu.edit-user', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('admin.menu.delete', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
