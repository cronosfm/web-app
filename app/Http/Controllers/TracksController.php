<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use JsonException;

class TracksController extends Controller
{
    public function Index()
    {
        return Track::all();
    }

    public function RecsIndex()
    {
        //Se puede ir al diablo todo esto.

        $Recs = DB::table("tracks as t")
            ->join("albums as al" , "al.id" , "=" , "t.album_id")
            ->join("artists as a" , "a.id" , "=" , "al.artist_id")
            ->select("t.id as track_id" ,  "t.album_id as album_id" , "t.name as track_name" , "a.name as artist_name" , "al.image_url as album_url" , "t.storage_url as storage_url" )
            ->get();

        return response()->json($Recs , 200);

    }

    public function Find($id)
    {
        return Track::findOrFail($id);
    }

    public function Store(Request $request)
    {
        //Validamos que exista el album al que se pertenece.
        $request->validate([
            "album_id"  => ["required"] , 
            "name"      => ["required"] , 
            "track_file" => ["required" , "file"] , 
        ]);

        Album::findOrFail($request->album_id);

        $Nuevo = DB::transaction( function() use($request) 
        {

            $storu = Storage::put("Tracks", $request->track_file);
            $Nuevo = new Track;
            $Nuevo->name = $request->name;
            $Nuevo->album_id = $request->album_id;
            $Nuevo->storage_url = $storu;
            $Nuevo->save();

            return $Nuevo;
        });

        return response()->json($Nuevo , 200);    
    }

    public function LikedByUser()
    {
        $User = Auth::user();

        $Rolas = $User->liked_tracks;

        return response()->json($Rolas , 200);
    }

    public function LikeTrack($id)
    {
        /** @var User $User */
        $User = Auth::user();

        $Track = Track::findOrFail($id);

        //Duhhhhhhhhhhhhhhhhhh

        $Or = DB::table("track_likes")
                ->where("user_id" , $User->id)
                ->where("track_id" , $Track->id)
                ->first();

        if($Or) throw new JsonException("Ya le diste like a esta rola");

        $User->liked_tracks()->save($Track);

        return response()->json($User->liked_tracks , 200);
    }

    public function UnlikeTrack($id)
    {
        /** @var User $User */
        $User = Auth::user();

        $Track = Track::findOrFail($id);

        //Duhhhhhhhhhhhhhhhhhh

        $Or = DB::table("track_likes")
                ->where("user_id" , $User->id)
                ->where("track_id" , $Track->id)
                ->first();

        if(!$Or) throw new JsonException("No le hab??as dado like a esta rola!");

        $User->liked_tracks()->detach($Track);

        return response()->json($User->liked_tracks , 200);
    }

    public function search(Request $request)
    {
        $Data = $request->validate([
            "name" => "string | max:255 | required"
        ]);

        $Busqueda = Track::where("name" , "ilike" , "%". $Data["name"]."%")
            ->with("album")
            ->get();

        return response()->json($Busqueda , 200);
    }
}
