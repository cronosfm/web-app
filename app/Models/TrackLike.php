<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $track_id
 * @property string $created_at
 * @property string $updated_at
 */
class TrackLike extends Model
{
    protected $table = "track_likes";
    use HasFactory;

    public function Track()
    {
        return $this->hasOne(Track::class , "id" , "track_id");
    }

    public function User()
    {
        return $this->hasOne(User::class , "id" , "user_id");
    }
}
