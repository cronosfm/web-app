<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function Register(Request $request)
    {
        $creds = $request->validate([
            "email" => ["required" , "email"] , 
            "password" => ["required"] , 
            "name" => ["required"] , 
        ]);

        //Validamos
        //No exista el correo
        $Usu = User::where("email" , $creds["email"])->first();

        if($Usu) return redirect()->route("register")->with("email_ocupado" , 1);
        

        $Hasheado = bcrypt($creds["password"]);

        $User = new User;
        $User->email = $creds["email"];
        $User->password =  $Hasheado;
        $User->name =  $creds["name"];
        $User->birthday =  '2021/01/01';
        $User->gender =  "male";
        $User->api_token = User::GenerateToken();

        $User->save();

        Auth::login($User);

        return redirect("/");

    }

    public function Logout()
    {
        Auth::logout();

        return redirect("/");
    }
}
