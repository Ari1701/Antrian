<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Antrian;
use App\Models\JadwalDokter;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'totalUsers' => User::count(),
            'totalAntrian' => Antrian::count(),
            'totalDokter' => JadwalDokter::count(),
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); 
        return view('admin.menu.edit-user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'no_ktp' => 'required|string|max:16',
            'no_hp' => 'required|string|max:15',
            'pekerjaan' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('admin.menu.show-user')->with('success', 'Data berhasil diperbarui!');
    }

    public function profile()
    {
        {
            $users = User::All();
    
            return view('admin.menu.show-user', compact('users'));
        }
    
    }

    public function destroy($id) {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.menu.show-user')->with('success', 'Jadwal berhasil dihapus.');
    }

    public function jadwal()
    {
        $jadwal = JadwalDokter::all(); 
        return view('admin.menu.jadwal-show', compact('jadwal'));
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

        JadwalDokter::create($request->all());

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
    
    public function lihatantrian(Request $request)
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

        return view('admin.menu.antrian-show', compact('antrians', 'poli_list', 'search', 'poli_filter'));

        $this->hapusAntrianLama();

        $antrians = Antrian::where('user_id', auth()->id())->get();
        return view('admin.menu.antrian-show', compact('antrians'));
    }

}
