<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistsController extends Controller
{
    public function Index()
    {
        return Playlist::all();
    }
}
