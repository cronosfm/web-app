<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use JsonException;

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

    public function Store(Request $request)
    {
        $Datos = $request->validate([
            "name" => "string | max:200 | required " , 
            "image" => "file"
        ]);

        $User = Auth::user();

        $Playlist = new Playlist;
        $Playlist->image = $Datos["image"] ? $Datos["image"] : "images/DEFAULT.png";
        $Playlist->user_id = $User->id;
        $Playlist->save();

        return response()->json($Playlist , 200);
    }

    public function AddTrackToPlaylist($PlaylistId , $TrackId)
    {
        // Podrías poner esto en el construct para que se comparta por parte de toda la clase.
        $User = Auth::user();

        $Playlist = Playlist::findOrFail($PlaylistId);
        $Track = Track::findOrFail($TrackId);

        if($Playlist->user_id <> $User->id) throw new JsonException("No es el dueño de esta playlist" , 403);

        $Playlist->tracks()->save($Track);
        $Playlist->load("tracks");

        return response()->json($Playlist , 200);
    }

    public function RemoveTrackFromPlaylist($PlaylistId , $TrackId)
    {
        // Podrías poner esto en el construct para que se comparta por parte de toda la clase.
        $User = Auth::user();

        $Playlist = Playlist::findOrFail($PlaylistId);
        $Track = Track::findOrFail($TrackId);

        if($Playlist->user_id <> $User->id) throw new JsonException("No es el dueño de esta playlist" , 403);

        $Playlist->tracks()->save($Track);
        $Playlist->load("tracks");

        return response()->json($Playlist , 200);
    }

    public function DeletePlaylist($Id)
    {
        $User = Auth::user();

        $Playlist = Playlist::findOrFail($Id);

        if($Playlist->user_id <> $User->id) throw new JsonException("No es el dueño del playlist" , 403);

        $Operacion = DB::transaction( function() use($Playlist)
        {
            $Playlist->delete();
            // Deberías eliminar los pivotes aquí.

        });
        return response()->json("Playlist Eliminado" , 200);

        

    }

    public function RenamePlaylist()
    {

    }
}
