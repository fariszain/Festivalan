<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // ID user yang mengajukan/membuat event
        'title',
        'description',
        'schedule_start',
        'schedule_end',
        'location',
        'event_category',
        'image_path',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'schedule_start' => 'datetime',
        'schedule_end' => 'datetime',
    ];

    /**
     * Get the user that proposed the event.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The users that are registered for this event.
     * Mendefinisikan relasi many-to-many dengan User melalui tabel pivot event_user.
     */
    public function registeredUsers()
    {
        // Argumen kedua adalah nama tabel pivot (defaultnya event_user jika mengikuti konvensi)
        // withTimestamps() digunakan jika tabel pivot Anda memiliki kolom created_at dan updated_at
        return $this->belongsToMany(User::class, 'event_user', 'event_id', 'user_id')->withTimestamps();
    }
}