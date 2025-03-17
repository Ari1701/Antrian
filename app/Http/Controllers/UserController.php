<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
            
        return view('dashboard.utama', compact('antrians', 'poli_list', 'search', 'poli_filter'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('dashboard.edit-profil', compact('user'));
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

        return redirect()->route('dashboard.profil')->with('success', 'Data berhasil diperbarui!');
    }


    public function profile()
    {
        {
            $users = Auth::user();
    
            return view('dashboard.profil', compact('users'));
        }
    
    }
}
