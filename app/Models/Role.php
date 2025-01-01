<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Tambahkan HasFactory
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory; // Tambahkan HasFactory trait

    protected $table = 'roles'; // Tentukan nama tabel
    public $timestamps = false; // Nonaktifkan penggunaan timestamps (created_at, updated_at)

    protected $fillable = ['role_name']; // Hanya kolom yang diizinkan untuk diisi
}
