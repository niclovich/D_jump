<?php

use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
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
Route::resource('/articulos', ArticulosController::class)->names('articuloss');
Route::get('articulos', [HomeController::class, 'articulos'])->name('articulossinlog');

Route::resource('/', HomeController::class)->names('/');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/send-email', [EmailController::class, 'index']);
