@extends('admin.layouts.app')

@section('title', 'Jadwal Dokter') 

@section('content') 
<div class="container">
    <h2>Edit Jadwal Dokter</h2>

    {{-- Notifikasi Error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan pada input:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.menu.jadwal-update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="nip">NIP (tidak bisa diubah)</label>
            <input type="text" class="form-control" value="{{ $jadwal->nip }}" disabled>
        </div>

        <div class="form-group mb-3">
            <label for="nama_dokter">Nama Dokter</label>
            <input type="text" name="nama_dokter" class="form-control" value="{{ old('nama_dokter', $jadwal->nama_dokter) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="poli">Poli</label>
            <select name="poli" class="form-control" required>
                @php
                    $poliOptions = ['umum', 'gigi', 'tht', 'lansia & disabilitas', 'balita', 'kia & kb', 'nifas/pnc'];
                @endphp
                @foreach($poliOptions as $poli)
                    <option value="{{ $poli }}" {{ old('poli', $jadwal->poli) == $poli ? 'selected' : '' }}>
                        {{ ucfirst($poli) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="sesi">Sesi</label>
            <select name="sesi" class="form-control" required>
                @foreach (['Pagi', 'Siang', 'Sore', 'Malam'] as $sesi)
                    <option value="{{ $sesi }}" {{ old('sesi', $jadwal->sesi) == $sesi ? 'selected' : '' }}>
                        {{ $sesi }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="jam_mulai">Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control"
                   value="{{ old('jam_mulai', \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i')) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="jam_selesai">Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control"
                   value="{{ old('jam_selesai', \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i')) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.menu.jadwal-show') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
