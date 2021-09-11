<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = "genres";
    use HasFactory;

    public function Albums()
    {
        return $this->hasMany(Album::class , "genre_id" , "id");
    }
}
