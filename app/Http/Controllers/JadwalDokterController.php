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
        return view('admin.menu.jadwal-create');
    }

    public function store(Request $request) {
        $request->validate([
            'nip' => 'required|string|unique:jadwal_dokter,nip',
            'nama_dokter' => 'required|string|max:255',
            'poli' => 'required|string',
            'sesi' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
        ]);


        JadwalDokter::create([
            'nip' => $request->nip,
            'nama_dokter' => $request->nama_dokter,
            'poli' => $request->poli,
            'sesi' => $request->sesi,
            'jam_mulai' => $request->jam_mulai,  
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('admin.menu.jadwal-show')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function editjadwal($id)
    {
        $jadwal = JadwalDokter::findOrFail($id);
        return view('admin.menu.jadwal-edit', compact('jadwal'));
    }

    public function updatejadwal(Request $request, $id)
    {
        $jadwal = JadwalDokter::findOrFail($id);
    
        $request->validate([
            'nama_dokter' => 'required|string|max:255',
            'poli' => 'required|in:umum,gigi,tht,lansia & disabilitas,balita,kia & kb,nifas/pnc',
            'sesi' => 'required|in:Pagi,Siang,Sore,Malam',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);
        
        $jadwal->nama_dokter = $request->nama_dokter;
        $jadwal->poli = $request->poli;
        $jadwal->sesi = $request->sesi;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_selesai = $request->jam_selesai;
        $jadwal->save();
    
        return redirect()->route('admin.menu.jadwal-show')->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $jadwal = JadwalDokter::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('admin.menu.jadwal-show')
            ->with('success', 'Jadwal berhasil dihapus!');
    }

}
