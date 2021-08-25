<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AlbumsController extends Controller
{
    //
    public function Index()
    {
        $Cosas = Album::all();

        return response()->json($Cosas , 200);
    }

    public function Store(Request $request)
    {
        //Validamos que exista el album al que se pertenece.
        $request->validate([
            "artist_id"  => ["required"] , 
            "genre_id"  => ["required"] , 
            "name"      => ["required"] , 
            "file" => ["required" , "file"]
        ]);

        Artist::findOrFail($request->artist_id);
        Genre::findOrFail($request->genre_id);

        $Nuevo = DB::transaction( function() use($request) 
        {

            $storu = Storage::put("Albums", $request->file);
            $Nuevo = new Album;
            $Nuevo->name = $request->name;
            $Nuevo->genre_id = $request->genre_id;
            $Nuevo->artist_id = $request->artist_id;
            $Nuevo->image_url = $storu;
            $Nuevo->save();

            return $Nuevo;
        });

        return response()->json($Nuevo , 200);
    }
}
