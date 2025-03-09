<?php

// app/Http/Middleware/RoleMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($role == 'admin' && $user->email != 'admin@gmail.com') {
            return redirect('/home')->with('error', 'Anda tidak memiliki akses ke halaman ini');
        }

        if ($role == 'user' && $user->email == 'admin@gmail.com') {
            return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini');
        }

        return $next($request);
    }
}
