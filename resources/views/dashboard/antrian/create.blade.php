@extends('dashboard.layouts.app')

@section('title', 'home') 

@section('content') 
<div class="container">
    <h2>Ambil Antrian</h2>
    <form action="{{ route('antrian.store') }}" method="POST">
        @csrf
        <input type="hidden" name="no_antrian" id="no_antrian" value="">
        <input type="hidden" name="tgl_antrian" value="{{ date('Y-m-d') }}">

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
        </div>
        
        <div class="mb-3">
            <label for="poli" class="form-label">Pilih Poli</label>
            <select name="poli" id="poli" class="form-select" required>
                <option value="">-- Pilih Poli --</option>
                <option value="umum">Poli Umum</option>
                <option value="gigi">Poli Gigi</option>
                <option value="tht">Poli THT</option>
                <option value="lansia & disabilitas">Lansia & Disabilitas</option>
                <option value="balita">Balita</option>
                <option value="kia & kb">KIA & KB</option>
                <option value="nifas/pnc">Nifas / PNC</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="sesi" class="form-label">Pilih Sesi</label>
            <select name="sesi" id="sesi" class="form-select" required>
                <option value="">-- Pilih Sesi --</option>
                <option value="pagi">Pagi</option>
                <option value="siang">Siang</option>
                <option value="sore">Sore</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Ambil Antrian</button>
        <a href="{{ route('dashboard.utama') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
