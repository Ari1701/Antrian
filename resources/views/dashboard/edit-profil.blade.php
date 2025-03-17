@extends('dashboard.layouts.app')

@section('title', 'Edit Profil') 

@section('content') 
<div class="container text-center">
    <div class="row">
        <div class="container">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="card-title"  style="text-align: center">Edit Profil</div>
                    <div class="row">
            </div>

            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h4 class="text-center">Edit Data Pengguna</h4>
                                <form method="POST" action="{{ route('dashboard.update-profil', $user->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="name" class="form-label"><strong>Nama</strong></label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label"><strong>Email</strong></label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tgl_lahir" class="form-label"><strong>Tanggal Lahir</strong></label>
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $user->tgl_lahir }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat" class="form-label"><strong>Alamat</strong></label>
                                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $user->alamat }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="jenis_kelamin" class="form-label"><strong>Jenis Kelamin</strong></label>
                                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option value="Laki-laki" {{ $user->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="Perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_ktp" class="form-label"><strong>No KTP</strong></label>
                                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{ $user->no_ktp }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label"><strong>No HP</strong></label>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $user->no_hp }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="pekerjaan" class="form-label"><strong>Pekerjaan</strong></label>
                                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $user->pekerjaan }}" required>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                        <a href="{{ route('dashboard.profil') }}" class="btn btn-secondary">Batal</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
