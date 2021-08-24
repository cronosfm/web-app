<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function sLogin()
    {

    }

    public function Login(Request $request)
    {
        $creds = $request->validate([
            "email" => ["required" , "email"] , 
            "password" => ["required" ]
        ]);

        if(Auth::attempt($creds))
        {
            return redirect("/" );
        }
        else
        {
            return view("/login")->with("errors" , "hola");
        }
    }
}
