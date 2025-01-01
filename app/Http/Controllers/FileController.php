<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\File;
use App\Models\Folder;
use Carbon\Carbon;

class FileController extends Controller
{
    // Menampilkan daftar file dalam folder tertentu
    public function index($folderId)
    {
        $user = Auth::user();
        $folder = Folder::findOrFail($folderId);

        // Ambil semua file di folder yang diakses
        $files = File::where('folder_id', $folderId)->orderBy('date', 'asc')->paginate(10);

        return view('file.read', compact('files', 'folder'));
    }

    // Menampilkan folder dan semua file di dalamnya
    public function show($folderId)
    {
        $folder = Folder::findOrFail($folderId);
        $files = $folder->files; // Ambil semua file di dalam folder

        return view('file.read', compact('folder', 'files'));
    }

    // Menampilkan halaman pembuatan file baru
    public function create($folderId)
    {
        $folder = Folder::findOrFail($folderId);

        // Admin atau pemilik folder dapat mengakses halaman create
        return view('file.create', compact('folder'));
    }

    // Menyimpan file baru
    public function store(Request $request, $folderId)
    {
        $folder = Folder::findOrFail($folderId);

        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|file|mimes:doc,docx,xls,xlsx,pdf|max:2048',
            'date' => 'required|date_format:d/m/Y',
        ]);

        $file = $request->file('file');
        $filePath = $file->store('files', 'public');

        File::create([
            'name' => $request->name,
            'folder_id' => $folderId,
            'user_id' => Auth::id(),
            'path' => $filePath,
            'detail' => $file->getClientOriginalExtension(),
            'date' => Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'),
        ]);

        return redirect()->route('folders.files.index', ['folder' => $folderId])
            ->with('success', 'File berhasil diunggah.');
    }

    // Menampilkan halaman edit file
    public function edit($folderId, $fileId)
    {
        $folder = Folder::findOrFail($folderId);
        $file = File::findOrFail($fileId);

        return view('file.update', compact('file', 'folder'));
    }

    // Memperbarui file
    public function update(Request $request, $folderId, $fileId)
    {
        $file = File::findOrFail($fileId);

        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date_format:d/m/Y',
        ]);

        $file->update([
            'name' => $request->name,
            'date' => Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'),
        ]);

        return redirect()->route('folders.files.index', ['folder' => $folderId])
            ->with('success', 'File berhasil diperbarui.');
    }

    // Menghapus file
    public function destroy($folderId, $fileId)
    {
        $file = File::findOrFail($fileId);

        if (Storage::disk('public')->exists($file->path)) {
            Storage::disk('public')->delete($file->path);
        }

        $file->delete();

        return redirect()->route('folders.files.index', ['folder' => $folderId])
            ->with('success', 'File berhasil dihapus.');
    }

    // Mengunduh file
    public function downloadFile(File $file)
    {
        $filePath = 'files/' . $file->path;

        if (Storage::disk('public')->exists($filePath)) {
            return response()->download(storage_path('app/public/' . $filePath), $file->name);
        }

        return redirect()->back()->with('error', 'File tidak ditemukan');
    }
}
