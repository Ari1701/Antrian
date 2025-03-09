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

    public function profile()
    {
        {
            $users = Auth::user();
    
            return view('dashboard.profil', compact('users'));
        }
    
    }
}
