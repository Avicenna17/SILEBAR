<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // View untuk form login
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cari user berdasarkan username
        $user = User::where('username', $request->input('username'))->first();

        // Cek apakah user ditemukan dan password valid
        if ($user && Hash::check($request->input('password'), $user->password)) {
            // Jika login berhasil, ubah status menjadi ONLINE
            $user->status = 'online'; // Perubahan status menjadi 'online'
            $user->save();

            // Login pengguna
            Auth::login($user);

            // Redirect ke dashboard
            return redirect()->route('dashboard');
        } else {
            // Jika login gagal
            return back()->withErrors(['login' => 'Username atau password salah.']);
        }
    }

    public function logout()
    {
        // Logout pengguna dan ubah status menjadi OFFLINE
        $user = Auth::user();
        if ($user instanceof User) {
            $user->status = 'OFFLINE';
            $user->save(); // Simpan status offline
        }

        Auth::logout();

        // Redirect ke halaman login
        return redirect()->route('login');
    }
}
