<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Folder;

class CheckUserAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $folder = $request->route('folder');  // Ambil folder dari route

        // Jika parameter 'folder' adalah ID, ubah menjadi objek Folder
        if (is_numeric($folder)) {
            $folder = Folder::find($folder);
        }

        // Beri akses penuh kepada admin tanpa pengecekan lebih lanjut
        if ($user->role->role_name === 'admin') {
            return $next($request);
        }

        // Untuk pengguna biasa, periksa akses berdasarkan nama route
        $routeName = $request->route()->getName();
        if ($folder instanceof Folder) {
            // Izinkan akses unduhan atau tampilan folder untuk pengguna biasa
            if ($routeName === 'file.download' || $routeName === 'folders.show' || $routeName === 'folders.files.index') {
                return $next($request);
            }

            // Batasi akses CRUD pada folder milik pengguna
            if ($folder->user_id === $user->id) {
                return $next($request);
            }

            // Blokir akses jika bukan pemilik dan bukan akses unduhan atau tampilan
            return redirect()->route('folders.index')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        // Jika folder tidak ditemukan atau pengguna tidak memiliki akses
        return redirect()->route('folders.index')->with('error', 'Folder tidak ditemukan atau akses ditolak.');
    }
}
