<?php

use App\Http\Controllers\AlbumsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeployController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\PlaylistsController;
use App\Http\Controllers\TracksController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('deploy', [DeployController::class , "deploy"]);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/login" , [AuthController::class , "Login"]);
Route::post("/register" , [AuthController::class , "Register"]);


Route::middleware("auth:api")->post("/logout" , [AuthController::class , "Logout"] );


Route::group(["prefix" => "tracks"] , function () 
{
    Route::get("/" , [TracksController::class , "Index"]);
    Route::get("/find/{id}" , [TracksController::class , "Find"]);
    Route::get("/recs" , [TracksController::class , "RecsIndex"]);
    Route::post("/" , [TracksController::class , "Store"]);

    
    Route::group(["middleware" => "auth:api"] , function()
    {
        Route::get("/liked" , [TracksController::class , "LikedByUser"]);
        Route::post("/{id}/like" , [TracksController::class , "LikeTrack"]);
        Route::post("/{id}/unlike" , [TracksController::class , "UnlikeTrack"]);
    });

});

Route::group(["prefix" => "playlists"] , function () 
{
    Route::get("/" , [PlaylistsController::class , "Index"]);
    Route::get("/{id}" , [PlaylistsController::class , "Find"]);
});

Route::group(["prefix" => "albums"] , function () 
{
    Route::get("/" , [AlbumsController::class , "Index"]);
    Route::get("/find/{id}" , [AlbumsController::class , "Find"]);
    Route::post("/store" , [AlbumsController::class , "Store"]);

});

Route::group(["prefix" => "genres"] , function () 
{
    Route::get("/" , [GenresController::class , "Index"]);
    Route::get("/{id}" , [GenresController::class , "Find"]);
});

