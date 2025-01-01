<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function index()
    {
        // Mengambil semua data folder dari database
        $folders = Folder::all()->map(function ($folder) {
            // Mapping warna dan gambar berdasarkan nama atau ID
            $folder->color = match($folder->name) {
                'SDM' => '#A0D683',
                'CD Traksi' => '#FFD93D',
                'TUK' => '#FF8D29',
                'Tanaman' => '#457b9d',
                'PKS (LABOR)' => '#FF5D6C',
                'PKS (TEKNIK)' => '#758184',
                'PKS (PENGOLAHAN)' => '#02A8A8',
                default => '#E8EAE6'
            };

            $folder->image_url = match($folder->name) {
                'SDM' => '/img/sdm.jpg',
                'CD Traksi' => '/img/cdtraksi.jpg',
                'TUK' => '/img/tuk.jpg',
                'Tanaman' => '/img/tanaman.jpg',
                'PKS (LABOR)' => '/img/pkslabor.jpg',
                'PKS (TEKNIK)' => '/img/pksteknik.jpg',
                'PKS (PENGOLAHAN)' => '/img/pkspengolahan.jpg',
                default => '/img/default.jpg' // pastikan ada gambar default
            };

            return $folder;
        });

        // Mengirimkan data folder ke tampilan 'folder'
        return view('folder', compact('folders'));
    }

    public function show($id)
    {
        // Mengambil folder berdasarkan ID
        $folder = Folder::findOrFail($id);

        // Menentukan warna dan gambar untuk folder yang ditampilkan berdasarkan nama
        $folder->color = match($folder->name) {
            'SDM' => '#A0D683',
            'CD Traksi' => '#FFD93D',
            'TUK' => '#FF8D29',
            'Tanaman' => '#457b9d',
            'PKS (LABOR)' => '#FF5D6C',
            'PKS (TEKNIK)' => '#758184',
            'PKS (PENGOLAHAN)' => '#02A8A8',
            default => '#E8EAE6'
        };

        $folder->image_url = match($folder->name) {
            'SDM' => asset('img/sdm.jpg'),
            'CD Traksi' => asset('img/cdtraksi.jpg'),
            'TUK' => asset('img/tuk.jpg'),
            'Tanaman' => asset('img/tanaman.jpg'),
            'PKS (LABOR)' => asset('img/pkslabor.jpg'),
            'PKS (TEKNIK)' => asset('img/pksteknik.jpg'),
            'PKS (PENGOLAHAN)' => asset('img/pkspengolahan.jpg'),
            default => asset('img/default.jpg')
        };

        // Mengirimkan data folder ke tampilan 'read'
        return view('read', compact('folder'));
    }
}
