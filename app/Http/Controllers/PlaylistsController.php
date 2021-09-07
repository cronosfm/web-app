<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistsController extends Controller
{
    public function Index()
    {
        return Playlist::all();
    }

    public function Find($id)
    {
        return Playlist::findOrFail($id);
    }

    public function IndexUser()
    {
        $User = Auth::user();

        // AHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH

        $Playlists = Playlist::where("user_id" , $User->id)
            ->get();

        return response()->json($Playlists,200);
    }
}
