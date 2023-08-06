<?php

namespace App\Models;

use App\Models\Enums\PlaylistAccessibility;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}