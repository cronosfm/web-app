<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistsController extends Controller
{
    public function Index()
    {
        return Artist::all();
    }
}
