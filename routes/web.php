<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\FileController;

// Route untuk login
Route::get('/', [AuthController::class, 'showLoginForm']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

// Route untuk folder dan file
Route::middleware(['auth'])->group(function () {
    // Semua user dapat mengakses halaman daftar folder dan melihat isi folder
    Route::get('folders', [FolderController::class, 'index'])->name('folders.index');
    Route::get('folders/{folder}', [FolderController::class, 'show'])->name('folders.show');

    // Group untuk file CRUD dengan middleware `checkUserAccess`
    Route::middleware(['checkUserAccess'])->group(function () {
        Route::get('folders/{folder}/files', [FileController::class, 'index'])->name('folders.files.index');
        Route::post('folders/{folder}/files', [FileController::class, 'store'])->name('folders.files.store');
        Route::get('folders/{folder}/files/create', [FileController::class, 'create'])->name('folders.files.create');
        Route::get('folders/{folder}/files/{file}', [FileController::class, 'show'])->name('folders.files.show');
        Route::get('folders/{folder}/files/{file}/edit', [FileController::class, 'edit'])->name('folders.files.edit');
        Route::put('folders/{folder}/files/{file}', [FileController::class, 'update'])->name('folders.files.update');
        Route::delete('folders/{folder}/files/{file}', [FileController::class, 'destroy'])->name('folders.files.destroy');
        Route::get('/file/download/{file}', [FileController::class, 'downloadFile'])->name('file.download');
    });
});


