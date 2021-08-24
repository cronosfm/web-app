<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JsonException;
use Nette\Utils\Json;

class AuthController extends Controller
{
    public function Login(Request $request)
    {
        $cosas = $request->validate([
            "email" => ["required" , "email"] , 
            "password" => ["required"]
        ]);

        if(Auth::validate($cosas))
        {
            $Usuario = User::where("email" , $cosas["email"])->first();
            $Usuario->api_token =  User::GenerateToken();
            $Usuario->save();
            return $Usuario;
        }

        return response("Credenciales Incorrectas" , 403);
    }

    public function Register(Request $request)
    {
        $cosas = $request->validate([
            "email" => ["required" , "email"] , 
            "password" => ["required"] , 
            "name" => ["required"] , 
            "birthday" => ["required" , "date"] , 
            "gender" => ["required"] , 
        ]);

        $Hasheado = bcrypt($cosas["password"]);

        if(User::where("email" , $cosas["email"])->first()) throw new JsonException("El correo ya está registrado" , 401 );
        $User = new User;

        $User->email = $cosas["email"];
        $User->password =  $Hasheado;
        $User->name =  $cosas["name"];
        $User->birthday =  $cosas["birthday"];
        $User->gender =  $cosas["gender"];
        $User->api_token = User::GenerateToken();

        $User->save();

        return response($User , 200);

    }

    public function Logout(Request $request)
    {
        /**
         * @var User $User
         */
        $User = Auth::user();

        $User->api_token = null;
        $User->save();

        return response()->json(null , 200);
    }
}
