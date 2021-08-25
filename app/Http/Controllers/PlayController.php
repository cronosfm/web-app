<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class PlayController extends Controller
{
    public function index()
    {
        $Generos = Genre::all();
        //Cargamos las cosas

        //Devolvemos la vista.

        return view("player")
            ->with("generos" , $Generos);
    }
}
