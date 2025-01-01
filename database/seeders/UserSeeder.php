<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB; // Tambahkan DB facade untuk transaction handling

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::transaction(function () {
            // Cek apakah peran sudah ada sebelum membuatnya
            $adminRole = Role::firstOrCreate(['role_name' => 'admin']);
            $userRole = Role::firstOrCreate(['role_name' => 'user']);

            // Buat admin
            User::create([
                'username' => 'admin@gmail.com',
                'password' => Hash::make('admin-silebar'),
                'role_id' => $adminRole->id,
                'status' => 'ONLINE', // Set status jika diperlukan
            ]);

            // Buat pengguna dengan peran "user"
            $users = [
                ['username' => 'sdm@gmail.com', 'password' => 'sdm-silebar'],
                ['username' => 'cd_traksi@gmail.com', 'password' => 'cd_traksi-silebar'],
                ['username' => 'tuk@gmail.com', 'password' => 'tuk-silebar'],
                ['username' => 'tanaman@gmail.com', 'password' => 'tanaman-silebar'],
                ['username' => 'pks_labor@gmail.com', 'password' => 'pks_labor-silebar'],
                ['username' => 'pks_teknik@gmail.com', 'password' => 'pks_teknik-silebar'],
                ['username' => 'pks_pengolahan@gmail.com', 'password' => 'pks_pengolahan-silebar'],
            ];

            foreach ($users as $user) {
                User::create([
                    'username' => $user['username'],
                    'password' => Hash::make($user['password']),
                    'role_id' => $userRole->id,
                    'status' => 'OFFLINE', // Set status default untuk pengguna baru
                ]);
            }
        });
    }
}
