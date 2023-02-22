<?php

use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriaArticuloController;
use App\Http\Controllers\ComercioController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VentaController;
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
Route::get('/articulos/{articulo}', [ArticulosController::class, 'showinico'])->name('articulos.showinico');
Route::get('/articulos', [HomeController::class, 'articulos'])->name('articulosinicio');

Route::resource('/', HomeController::class)->names('/');

Route::put('/comerciodata{id}', [ComercioController::class, 'comercioshow'])->name('comercioshow');

Route::get('/comercios/all', [ComercioController::class, 'comercioindex'])->name('comercioall');
Route::get('/comercios/{comercio}', [ComercioController::class, 'show2'])->name('comercios.show2');

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
//Route::get('/', [CartController::class, 'shop'])->name('shop');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');


//Busquead
Route::get('/articulos', [SearchController::class, 'index'])->name('articulos.search');


Route::get('/comercios', [SearchController::class, 'searchcomercio'])->name('comercios.search');


Route::get('/comerciosindex', [ComercioController::class, 'comerciodata'])->name('comercios.data');


Route::resource('/categorias', CategoriaArticuloController::class)->names('categorias');


//pagos

Route::get('/checkout', [VentaController::class, 'checkout'])->name('venta.checkout');
Route::post('/paypal', [PaymentController::class, 'payWithpaypal'])->name('paypal');
Route::get('/status', [PaymentController::class, 'getPaymentStatus'])->name('status');
Route::post('/ventavalida', [VentaController::class, 'armarventa']);
