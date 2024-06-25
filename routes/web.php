<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SponsorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//per gestire tante rotte insieme sotto lo stesso middleware
//e raggrupparle con elementi comuni 
Route::middleware(['auth', 'verified'])
    ->name('admin.') // i loro nomi inizino tutti con "admin.
    ->prefix('admin') // tutti i loro url inizino con "admin/"
    ->group(function () {

        /*queste due rotte fanno la stessa cosa, ovvero creano il trio con DashboardController che 
        ho creato io dentro la cartella "admin" nella cartella "controllers" e il file 
        "dashboard.blade.php" nella cartella "profile" */ 
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/users', [DashboardController::class, 'users'])->name('users');


        

        //rotta per i games 
        Route::resource('/games', GameController::class);

        //rotta per i prodotti 
        Route::resource('/products', ProductController::class);


         //rotta per i blogs
         Route::resource('/blogs', BlogController::class);


          //rotta per gli sponsors
        Route::resource('/sponsors', SponsorController::class);

          //rotta per gli ordini
          Route::resource('/orders', OrderController::class);

          //rotta per le statistiche 
        Route::resource('/statistics',[StatsController::class]);




    });
