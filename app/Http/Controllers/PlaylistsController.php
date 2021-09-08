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

        $Playlists = Playlist::where("user_id" , $User->id)
            ->with("tracks")
            ->get();

        return response()->json($Playlists,200);
    }

    public function SearchPlaylistsByUser($name)
    {
        $User = Auth::user();

        $Playlists = Playlist::where("user_id" , $User->id)
            ->where("name" , "ilike" , "%".$name."%" )
            ->with("tracks")
            ->get();
        return response()->json($Playlists, 200);
    } 
}
