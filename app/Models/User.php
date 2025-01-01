<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait; // Import trait untuk autentikasi
use App\Models\Role;

class User extends Model implements Authenticatable // Implementasikan Authenticatable
{
    use HasFactory, Notifiable, AuthenticatableTrait; // Tambahkan trait

    // Menonaktifkan timestamp
    public $timestamps = false;

    // Field yang boleh diisi
    protected $fillable = [
        'username',
        'password',
        'role_id',
        'status'
    ];

    // Menyembunyikan password saat response JSON
    protected $hidden = [
        'password',
    ];

    // Relasi dengan model Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Relasi dengan Folder
    public function folders()
    {
        return $this->hasMany(Folder::class);
    }

    // Menambahkan metode isAdmin
    public function isAdmin()
    {
        return $this->role && $this->role->name === 'Admin';
    }
    
}
