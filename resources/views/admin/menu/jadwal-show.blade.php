@extends('admin.layouts.app')

@section('title', 'Jadwal Dokter') 

@section('content') 
<div class="container mt-5">
    <h2 class="text-center mb-4">Jadwal Dokter</h2>
    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Dokter</th>
                <th>Poli</th>
                <th>Sesi</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwal as $key => $data)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $data->nip }}</td>
                <td>{{ $data->nama_dokter }}</td>
                <td>{{ ucfirst($data->poli) }}</td>
                <td>{{ ucfirst($data->sesi) }}</td>
                <td>{{ \Carbon\Carbon::parse($data->jam_mulai)->format('H:i') }}</td>
                <td>{{ \Carbon\Carbon::parse($data->jam_selesai)->format('H:i') }}</td>
                <td class="d-flex gap-2">
                    <a href="{{ route('admin.menu.jadwal-edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.menu.jadwal-destroy', $data->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
