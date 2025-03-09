<?php

namespace App\Http\Controllers;

use App\Models\JadwalDokter;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller {
    
    public $nip, $nama_dokter, $poli, $sesi, $jam_mulai, $jam_selesai; 
    public $updateMode = false;
    public $search;
    public $poli_filter; 
    protected $queryString = ['search']; 
    
    public function index(Request $request) {
        $search = $request->get('search');
        $poli_filter = $request->get('poli_filter');
    
        $jadwal_dokter = JadwalDokter::query()
            ->when($search, function ($query) use ($search) {
                $query->where('nama_dokter', 'like', '%' . $search . '%')
                    ->orWhere('nip', 'like', '%' . $search . '%')
                    ->orWhere('poli', 'like', '%' . $search . '%');
            })
            ->when($poli_filter, function ($query) use ($poli_filter) {
                $query->where('poli', $poli_filter);
            })
            ->paginate(10);
    
        $poli_list = JadwalDokter::select('poli')->groupBy('poli')->pluck('poli');
    
        return view('dashboard.jadwaldokter', compact('jadwal_dokter', 'poli_list', 'search', 'poli_filter'));
    }

    public function create() {
        return view('jadwal.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nip' => 'required|string|unique:jadwal_dokters,nip',
            'nama_dokter' => 'required|string|max:255',
            'poli' => 'required|string',
            'sesi' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
        ]);

        JadwalDokter::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id) {
        $jadwal = JadwalDokter::findOrFail($id);
        return view('jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id) {
        $jadwal = JadwalDokter::findOrFail($id);

        $request->validate([
            'nip' => 'required|string|unique:jadwal_dokters,nip,' . $id,
            'nama_dokter' => 'required|string|max:255',
            'poli' => 'required|string',
            'sesi' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
        ]);

        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy($id) {
        JadwalDokter::findOrFail($id)->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }

}
