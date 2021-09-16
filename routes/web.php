<?php

use App\Http\Controllers\PlayController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::post("/auth/login" , [UserAuthController::class , "Login"]);

Route::post("/auth/register" , [UserAuthController::class , "Register"]);

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get("/login" , function() {
    return view("auth/login");
})->name("login");

Route::get("/register" , function() {
    return view("register");
})->name("register");


Route::group(["middleware" => "auth"] , function()
{
    Route::get("/" , [PlayController::class , "index"]);    
    Route::post("/logout" , [UserAuthController::class , "Logout"])->name("logout");
});

Route::middleware("auth")->get("auth/get-token" , function (Request $request)
{
    return $request->user()->api_token;
});

