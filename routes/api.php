<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\SponsorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// tutte le rotte presenti in api.php iniziano con "api/"
//attenti a impotare il post controller riferito all'Api
Route::get('/games', [GameController::class, 'index']);

Route::get('/blogs', [BlogController::class, 'index']);

Route::get('/sponsors', [SponsorController::class, 'index']);