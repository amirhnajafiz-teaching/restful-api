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

// Home page
Route::get('/', function () {
    return view('welcome');
});

// Route for weather channel form
Route::post('/channel', [\App\Http\Controllers\MainController::class, 'index'])
    ->name('channel.index');
