<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use Illuminate\Support\Facades\Auth;

class AntrianController extends Controller
{
    public $nip, $nama_dokter, $poli, $sesi, $jam_mulai, $jam_selesai, $no_antrian, $tgl_antrian; 
    public $updateMode = false;
    public $search;
    public $poli_filter; 
    protected $queryString = ['search']; 

    public function index(Request $request)
    {
        $search = $request->get('search');
        $poli_filter = $request->get('poli_filter');
    
        $antrians = Antrian::query()
            ->when($search, function ($query) use ($search) {
                $query->where('nama_dokter', 'like', '%' . $search . '%')
                    ->orWhere('nip', 'like', '%' . $search . '%')
                    ->orWhere('poli', 'like', '%' . $search . '%');
            })
            ->when($poli_filter, function ($query) use ($poli_filter) {
                $query->where('poli', $poli_filter);
            })
            ->paginate(10);
    
            $poli_list = Antrian::select('poli')->groupBy('poli')->pluck('poli');

        return view('dashboard.antrian.create', compact('antrians', 'poli_list', 'search', 'poli_filter'));
    }

    public function create()
    {
        return view('dashboard.antrian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'poli' => 'required|string',
            'sesi' => 'required|string'
        ]);

        $no_antrian = $this->save($request->poli);
    
        Antrian::create([
            'user_id' => Auth::id(),
            'poli' => $request->poli,
            'sesi' => $request->sesi,
            'no_antrian' => $no_antrian,
            'tgl_antrian' => $request->tgl_antrian ?? now()->toDateString(),
        ]);
    
        return redirect()->route('dashboard.utama')->with('success', 'Antrian berhasil diambil!');
    }
    

    public function save($poli)
    {
        $latestAntrian = Antrian::where('poli', $poli)
            ->where('tgl_antrian', now()->toDateString())
            ->latest('id')
            ->first();
    
        if (!$latestAntrian) {
            $prefixes = [
                'umum' => 'U', 'gigi' => 'G', 'tht' => 'T', 'lansia & disabilitas' => 'L',
                'balita' => 'B', 'kia & kb' => 'K', 'nifas/pnc' => 'N'
            ];
            $no_antrian = isset($prefixes[$poli]) ? $prefixes[$poli] . '1' : 'X1';
        } else {
            $kode_awal = substr($latestAntrian->no_antrian, 0, 1);
            $angka = (int) substr($latestAntrian->no_antrian, 1) + 1;
            $no_antrian = $kode_awal . $angka;
        }
    
        return $no_antrian;
    }
    
}
