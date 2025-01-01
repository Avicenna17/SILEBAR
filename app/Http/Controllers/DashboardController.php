<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\File;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Ambil data pengguna spesifik berdasarkan email yang diberikan
        $users = User::whereIn('username', [
            'admin@gmail.com',
            'sdm@gmail.com',
            'cd_traksi@gmail.com',
            'tuk@gmail.com',
            'tanaman@gmail.com',
            'pks_labor@gmail.com',
            'pks_teknik@gmail.com',
            'pks_pengolahan@gmail.com'
        ])
        ->orderByRaw("status = 'online' DESC")
        ->get();

        $activeUsersCount = User::where('status', 'online')->count();
        $totalFolders = Folder::count();
        $totalFiles = File::count();

        return view('dashboard', compact('users', 'activeUsersCount', 'totalFolders', 'totalFiles'));
    }

}
