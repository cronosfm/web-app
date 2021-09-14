<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function Index()
    {
        $Generos = Genre::all();

        return response()->json($Generos , 200);
    }

    public function find($id)
    {
        /**
         * @var Genre $Genre
         */
        $Genre = Genre::findOrFail($id);

        $Genre->load("Albums.Tracks");

        return response()->json($Genre);
    }

    public function store(Request $request)
    {
        $Datos = $request->validate([
            "name" => "string | required | max:255" , 
            "image" => "file"
        ]);

        $Nuevo = new Genre();

        $Nuevo->name = $Datos["name"];

        //Procesar Imagen Aquí.

        $Nuevo->save();

        return response()->json($Nuevo , 200);
    }

    public function delete($id)
    {
        $m = Genre::findOrFail($id);

        $m->delete();

        return response()->json("Eliminado" , 200);
    }
}
