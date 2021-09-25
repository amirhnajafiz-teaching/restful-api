<?php

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

// My routes
// Home
Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])
    ->name('home');

// Channel
Route::get('channel/{city?}', [\App\Http\Controllers\MainController::class, 'main'])
    ->name('channel');
