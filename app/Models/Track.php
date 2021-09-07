<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *  @property int $id 
 *  @property int $album_id
 *  @property string $name
 *  @property string $storage_url
 *  @property int $created_at
 *  @property int $updated_at
 * 
 */
class Track extends Model
{
    protected $table = "tracks";
    use HasFactory;

    public function Likes()
    {
        return $this->hasMany(TrackLike::class , "track_id" , "id");
    }
}
