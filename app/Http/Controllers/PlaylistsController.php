<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use JsonException;
use Playlists;

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

    public function IndexByUser()
    {
        $User = Auth::user();

        $Playlists = Playlist::where("user_id" , $User->id)
            ->with("tracks.album.artist")
            ->get();

        return response()->json($Playlists,200);
    }

    public function SearchPlaylistsByUser($name)
    {
        $User = Auth::user();

        $Playlists = Playlist::where("user_id" , $User->id)
            ->where("name" , "ilike" , "%".$name."%" )
            ->with("tracks.albums")
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

        //Obra de Satanas
        $Relacion = DB::table("playlist_tracks")
            ->where("track_id" , $Track->id)
            ->where("playlist_id" , $Playlist->id)
            ->first();

        if($Relacion) throw new JsonException("Ya se ha relacionado esta rola con esta lista" , 500);

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

        //Obra de Satanas
        $Relacion = DB::table("playlist_tracks")
            ->where("track_id" , $Track->id)
            ->where("playlist_id" , $Playlist->id)
            ->first();

        if(!$Relacion) throw new JsonException("Esta rola no tiene relación con la lista" , 500);


        $Playlist->tracks()->detach($Track);
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
        });

        return response()->json("Playlist Eliminado" , 200);
    }

    public function RenamePlaylist(Request $request)
    {
        $Datos = $request->validate([
            "name" => "string | max:255 | required" , 
            "playlist_id" => "number"
        ]);

        /** @var Playlist $Pl */
        $Pl = Playlist::findOrFail($Datos["playlist_id"]);

        $Pl->name = $Datos["name"];
        $Pl->save();

        return response()->json($Pl , 200);
    }
}
