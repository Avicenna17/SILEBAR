<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Folder;

class FoldersTableSeeder extends Seeder
{
    public function run()
    {
        // Folder untuk SDM
        Folder::create([
            'folder_name' => 'SDM',
            'user_id' => 2,
        ]);

        // Folder untuk CD Traksi
        Folder::create([
            'folder_name' => 'CD Traksi',
            'user_id' => 3,
        ]);

        // Folder untuk TUK
        Folder::create([
            'folder_name' => 'TUK',
            'user_id' => 4,
        ]);

        // Folder untuk Tanaman
        Folder::create([
            'folder_name' => 'Tanaman',
            'user_id' => 5,
        ]);

        // Folder untuk PKS (LABOR)
        Folder::create([
            'folder_name' => 'PKS (LABOR)',
            'user_id' => 6,
        ]);

        // Folder untuk PKS (TEKNIK)
        Folder::create([
            'folder_name' => 'PKS (TEKNIK)',
            'user_id' => 7,
        ]);

        // Folder untuk PKS (PENGOLAHAN)
        Folder::create([
            'folder_name' => 'PKS (PENGOLAHAN)',
            'user_id' => 8,
        ]);

    }
}
