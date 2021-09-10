<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table ="artists";
    use HasFactory;

    public function Albums()
    {
        return $this->hasMany(Album::class , "artist_id" , "id");
    }
}
