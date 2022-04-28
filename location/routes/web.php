<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\StatsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', [LocationController::class, 'search']);

Route::get('/hello/{name}', function ($name) {
    return "Hello $name";
});

Route::get('/stats', [StatsController::class, 'show']);

Route::get('/stats/{country}', [StatsController::class, 'showCountry']);
