@extends('dashboard.layouts.app')

@section('title', 'Profil') 

@section('content') 
<div class="container text-center">
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
                                <div class="card-body">
                                    <p><strong>Nama:</strong> {{ $users->name }}</p>
                                    <p><strong>Email:</strong> {{ $users->email }}</p>
                                    <p><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($users->tgl_lahir)->locale('id')->translatedFormat('j F Y') }}</p>
                                    <p><strong>Alamat:</strong> {{ $users->alamat }}</p>
                                    <p><strong>Jenis Kelamin:</strong> {{ $users->jenis_kelamin }}</p>
                                    <p><strong>No KTP:</strong> {{ $users->no_ktp }}</p>
                                    <p><strong>No HP:</strong> {{ $users->no_hp }}</p>
                                    <p><strong>Pekerjaan:</strong> {{ $users->pekerjaan }}</p>
                                </div>
                            </tbody>
                        </table>
                    
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
