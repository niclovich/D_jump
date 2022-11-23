<?php

use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriaArticuloController;
use App\Http\Controllers\ComercioController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DetallepedidoController;
use App\Http\Controllers\PanelHomeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
use App\Models\CategoriaArticulo;
use App\Models\Detallepedido;
use Illuminate\Support\Facades\Route ;
use JeroenNoten\LaravelAdminLte\View\Components\Tool\Datatable;

/*Route::get('/', function () {
    return view('panel.index');
});*/
Route::resource('/home', PanelHomeController::class)->names('/home');

Route::POST('/delete-users', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('generate-usuariospdf', [UserController::class,'generatePDF'])->name('users.generate-pdf');
Route::get('usuariosexport', [UserController::class, 'export'])->name('users.export');
Route::resource('/users', UserController::class)->names('users');
//->middleware('can:admin');


Route::resource('/categorias', CategoriaArticuloController::class)->names('categorias');


Route::get('armarpedido', [PedidoController::class, 'armarpedido'])->name('pedidos.armarpedido');
Route::resource('/pedidos', PedidoController::class)->names('pedidos');



Route::put('/PDF/{venta}', [VentaController::class,'generatePDF2'])->name('pedidos.generate2-pdf');

Route::get('generate-pedidospdf', [VentaController::class,'generatePDF'])->name('pedidos.generate-pdf');

Route::get('armarventa', [VentaController::class, 'armarventa'])->name('ventas.armarventa');

Route::resource('/ventas', VentaController::class)->names('ventas');

Route::resource('/detallepedidos', DetallepedidoController::class)->names('detallepedidos');


//Route::get('/comercios',[ComercioController::class,'index'])->name('comercios.index');
//Route::get('/comercios/{comercio}', [ComercioController::class, 'show'])->name('comercios.show');
//Route::get('/comercios/{comercio}/edit', [ComercioController::class, 'edit'])->name('comercios.edit');
//Route::delete('/comercios/{comercio}', [ComercioController::class, 'destroy'])->name('comercios.destroy');

Route::POST('/delete-comercios', [ComercioController::class, 'destroy'])->name('comercios.destroy');
Route::get('generate-comerciospdf2', [ComercioController::class,'generatePDF'])->name('comercios.generate-pdf');
Route::get('comerciosexport', [ComercioController::class, 'export'])->name('comercios.export');
Route::resource('/comercios', ComercioController::class)->names('comercios');
//->middleware('can:admin');

//ruta apra extraer usuarios por ajaxs

Route::POST('/delete-articulos', [ArticulosController::class, 'destroy'])->name('articulos.destroy');
Route::get('articulosexport', [ArticulosController::class, 'export'])->name('articulos.export');
Route::get('generate-articulopdf', [ArticulosController::class,'generatePDF'])->name('articulos.generate-pdf');

Route::resource('/articulos', ArticulosController::class)->names('articulos');


Route::get('eliminar', [ComercioController::class, 'eliminar'])->name('eliminar');


//Route::resource('/comercios', ComercioController::class)->names('comercios');

Route::get('/', [CartController::class, 'shop'])->name('shop');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');



