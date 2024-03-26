User
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Htttp\Controllers\ArtistController;
use app\Htttp\Controllers\SongController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource("songs", SongController::class)
    ->parameters(["songs" => "song"]);

Route::apiResource("artists", ArtistController::class)
    ->parameters(["artists" => "artist"])
    ->only(["index", "show"]);