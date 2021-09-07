<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id 
 * @property int $user_id 
 * @property string $name
 * @property string $image_url
 * @property string $created_at
 * @property string $updated_at
 * 
 */
class Playlist extends Model
{
    protected $table ="playlists";
    
    use HasFactory;
}
