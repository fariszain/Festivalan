<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response; // Pastikan ini di-import

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role  // Parameter role yang kita inginkan (misal: 'mahasiswa', 'admin')
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            // Jika pengguna belum login, arahkan ke halaman login/auth
            return redirect()->route('auth')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $user = Auth::user();

        // Cek apakah role pengguna sesuai dengan role yang diizinkan
        if ($user->role == $role) {
            return $next($request); // Lanjutkan request jika role sesuai
        }

        // Jika role tidak sesuai, arahkan ke Beranda dengan pesan error.
        return redirect()->route('Beranda')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}   