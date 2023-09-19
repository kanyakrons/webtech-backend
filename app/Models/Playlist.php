<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Enums\PlaylistAccessibility;

class Playlist extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'accessibility' => PlaylistAccessibility::class,
    ];

    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }

		public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublicList($query) {
        return $query->where('accessibility', PlaylistAccessibility::PUBLIC);
    }

    public function scopePrivateList($query) {
        return $query->where('accessibility', PlaylistAccessibility::PRIVATE);
    }

    public function scopeOfUser($query, $user_id) {
        return $query->where('user_id', $user_id);
    }

    public function scopFilterNameInclude($query, $name) {
        return $query->where('name', 'like', "%{$name}%");
    }

    public function isPrivate() :bool {
        return $this->accessibility ===PlaylistAccessibility::PRIVATE;
    }
}
