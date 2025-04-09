@extends('dashboard.layouts.app')

@section('title', 'Profil') 

@section('content') 
<div class="container text-left">
    <div class="row">
        <div class="container">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="card-title"  style="text-align: center">Profil</div>
                    <div class="row">
            </div>

            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table_id">
                        <tbody>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $users->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $users->email }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ \Carbon\Carbon::parse($users->tgl_lahir)->locale('id')->translatedFormat('j F Y') }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $users->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ $users->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>No KTP</th>
                                <td>{{ $users->no_ktp }}</td>
                            </tr>
                            <tr>
                                <th>No HP</th>
                                <td>{{ $users->no_hp }}</td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td>{{ $users->pekerjaan }}</td>
                            </tr>
                        </tbody>
                        </table>
                    
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
