@extends('dashboard.layouts.app')

@section('title', 'Jadwal') 

@section('content') 
<section id="antrian" class="d-flex align-items-center">
    <div class="container">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <div>
                <div class="container">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="card-title"  style="text-align: center">Jadwal Dokter</div>
                            <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                            <form method="GET" action="{{ route('jadwal.index') }}">
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <select name="poli_filter" class="form-select">
                                            <option value="">-- Pilih Poli --</option>
                                            @foreach($poli_list as $poli)
                                                <option value="{{ $poli }}" {{ request()->poli_filter == $poli ? 'selected' : '' }}>
                                                    {{ ucfirst($poli) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                        <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Reset</a>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_id">
                                    <thead>
                                    <tr style="text-align: center">
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama Dokter</th>
                                            <th>Poli</th>
                                            <th>Sesi</th>
                                            <th>Jam Mulai</th>
                                            <th>Jam Selesai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jadwal_dokter as $jadwal)
                                            <tr style="text-align: center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $jadwal->nip }}</td>
                                                <td><strong>{{ $jadwal->nama_dokter }}</strong></td>
                                                <td>{{ ucwords ($jadwal->poli) }}</td>
                                                <td>{{ $jadwal->sesi }}</td>
                                                <td>{{ $jadwal->jam_mulai }}</td>
                                                <td>{{ $jadwal->jam_selesai }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $jadwal_dokter->links() }}
                            
                            </div>

                        </div>
                    </div>
                </div>
</section>

@endsection