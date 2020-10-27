<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\PlacesController;

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

/********* Begin routes for HomeController **********/

Route::get('/', [HomeController::class, 'index']);
Route::get('index', [HomeController::class, 'index']);
Route::get('about', [HomeController::class, 'about']);
Route::get('blog', [HomeController::class, 'blog']);
Route::get('single-blog', [HomeController::class, 'single_blog']);
Route::get('contact', [HomeController::class, 'contact']);
Route::get('elements', [HomeController::class, 'elements']);

/********* End routes for HomeController **********/
/*-------------------------------------------------------------------*/
/********* Begin routes for DestinationController **********/

Route::get('destination_places/{id}', [DestinationsController::class, 'show']);
Route::post('store', [DestinationsController::class, 'store'])->name('destination.store');

/********* End routes for DestinationController **********/
/*------------------------------------------------------------------*/
/********* Begin routes for PlacesController **********/

Route::get('destination_details/{id}', [PlacesController::class, 'show']);

/********* End routes for PlacesController **********/

Route::prefix('admin')->group(function () {
    
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
