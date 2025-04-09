@extends('admin.layouts.app')

@section('title', 'Admin') 

@section('content') 
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Pengguna</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalUsers }}</h5>
                    <p class="card-text">Jumlah pengguna yang terdaftar.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Antrian</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalAntrian }}</h5>
                    <p class="card-text">Jumlah antrian aktif saat ini.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Jumlah Jadwal Dokter</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalDokter }}</h5>
                    <p class="card-text">Jadwal Dokter Saat Ini.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
