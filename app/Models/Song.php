<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Song extends Model
{
    use HasFactory;

    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }

    public function playlists(): BelongsToMany
    {
        return $this->belongsToMany(Playlist::class);
    }

    /*
    Get|CamelCase|Attribute
    */

    public function getDurationToStringAttribute(){
        $minute = (int) ($this->duration / 60);
        $second = $this->duration % 60;
        $second = Str::padLeft($second, 2, '0');
        return "{$minute}:{$second}";
    }
}
