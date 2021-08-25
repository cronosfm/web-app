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
}
