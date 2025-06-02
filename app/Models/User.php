<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Tambahkan jika belum ada
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens; // Uncomment jika Anda menggunakan Sanctum

class User extends Authenticatable
{
    use HasFactory, Notifiable; // Tambahkan HasFactory jika belum ada
    // use HasApiTokens, HasFactory, Notifiable; // Jika menggunakan Sanctum

    protected $fillable = [
        'name', 'username', 'email', 'password', 'role', 'npm', 'nip', 'phone_number', 'bio', 'avatar',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => 'string',
        // 'password' => 'hashed', // Di Laravel 10+, ini cara yang lebih baru untuk hashing otomatis
    ];

    /**
     * The events that the user is registered for.
     * Mendefinisikan relasi many-to-many dengan Event melalui tabel pivot event_user.
     */
    public function registeredEvents()
    {
        // Argumen kedua adalah nama tabel pivot
        // withTimestamps() jika tabel pivot Anda memiliki kolom created_at dan updated_at
        return $this->belongsToMany(Event::class, 'event_user', 'user_id', 'event_id')->withTimestamps();
    }

    /**
     * Events created by this user.
     */
    public function createdEvents()
    {
        return $this->hasMany(Event::class);
    }
}