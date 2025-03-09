@extends('dashboard.layouts.app')

@section('title', 'home') 

@section('content') 
<div class="container text-center">
    <div class="row">
        <div class="d-flex justify-content-center col-md-3">
            <a href="/antrian" class="btn btn-primary w-100 h-80 mb-3" id="ambilAntrian">Ambil Antrian</a>
        </div>

        <div class="container">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="card-title"  style="text-align: center">Antrian</div>
                    <div class="row">
                <div class="col-md-9">
                    <div class="mb-3">
                    <form method="GET" action="{{ route('dashboard.utama') }}">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <input type="text" name="search" value="{{ request()->search }}" class="form-control"
                                    placeholder="Cari Nama">
                            </div>

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
                                <a href="{{ route('dashboard.utama') }}" class="btn btn-secondary">Reset</a>
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
                            <tbody>
                                @foreach ($antrians as $antrian)
                                    <tr style="text-align: center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $antrian->user->name }}</td>
                                        <td>{{ $antrian->no_antrian }}</td>
                                        <td>{{ $antrian->poli }}</td>
                                        <td>{{ $antrian->sesi }}</td>
                                        <td>{{ \Carbon\Carbon::parse($antrian->tgl_antrian)->locale('id')->translatedFormat('j F Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $antrians->links() }}
                    
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
