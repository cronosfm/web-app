<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $track_id
 * @property int $playlist_id
 * 
 */
class PlaylistTrack extends Model
{
    protected $table = "playlist_tracks";
    use HasFactory;
}
