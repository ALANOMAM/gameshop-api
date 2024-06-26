<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SponsorController;
use App\Models\Product;
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

//rotta per ricavare tutti i games
Route::get('/games', [GameController::class, 'index']);
// rotta per la show del singolo game
Route::get('/games/{id}', [GameController::class, 'show']);

  

Route::get('/blogs', [BlogController::class, 'index']);

Route::get('/sponsors', [SponsorController::class, 'index']);


//rotta per ricavare tutti i prodotti
Route::get('/products', [ProductController::class, 'index']);
// rotta per la show del singolo prodotto
Route::get('/products/{id}', [ProductController::class, 'show']);