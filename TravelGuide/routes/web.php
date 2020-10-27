<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', [HomeController::class, 'index']);
Route::get('about', [HomeController::class, 'about']);
Route::get('blog', [HomeController::class, 'blog']);
Route::get('single-blog', [HomeController::class, 'single_blog']);
Route::get('travel_destination', [HomeController::class, 'travel_destination']);
Route::get('contact', [HomeController::class, 'contact']);
Route::get('elements', [HomeController::class, 'elements']);
Route::get('destination_details/{id}', [HomeController::class, 'show'])->name('destination_details');
Route::post('store', [HomeController::class, 'store'])->name('destination.store');

Route::prefix('admin')->group(function () {
    
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
