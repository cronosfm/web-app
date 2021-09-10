<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = "albums";
    use HasFactory;

    public function Tracks()
    {
        return $this->hasMany(Track::class , "album_id" , "id");
    }

    public function Artist()
    {
        return $this->belongsTo(Artist::class , "artist_id" , "id");
    }

    public function Genre()
    {
        return $this->belongsTo(Genre::class , "genre_id" , "id");
    }
}
