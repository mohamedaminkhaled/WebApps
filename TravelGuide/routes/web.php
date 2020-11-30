<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\PlacesController;
use App\Http\Controllers\DestController;

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
Route::post('store', [HomeController::class, 'store'])->name('destination.store');

/********* End routes for HomeController **********/

/*-------------------------------------------------------------------*/

/********* Begin routes for DestinationController **********/

Route::get('destination_places/{id}', [DestinationsController::class, 'show']);
Route::post('destinations/store', [DestinationsController::class, 'store'])->name('destination.store');
Route::get('/destinations', [DestinationsController::class, 'index']);

/********* End routes for DestinationController **********/

/*------------------------------------------------------------------*/

/********* Begin routes for PlacesController **********/

Route::get('destination_details/{id}', [PlacesController::class, 'show']);
Route::post('places/store', [PlacesController::class, 'store']);
Route::get('/places', [PlacesController::class, 'index']);

/********* End routes for PlacesController **********/

/*------------------------------------------------------------------*/

/********* Begin routes for Ajax **********/

Route::get('/destAjax/create', [DestController::class,'create']);
Route::post('/destAjax/store', [DestController::class,'store'])->name('ajaxdest.store'); 

/********* End routes for Ajax **********/

Route::prefix('admin')->group(function () {
    
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
