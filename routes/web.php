<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProveedoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VentaController;
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

//Route::get('/', function () {
   // return view('auth.login');
//});
Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();
Route::resource('empleados', EmpleadoController::class);
Route::resource('proveedores', ProveedoreController::class);
Route::resource('products', ProductController::class);
Route::resource('marcas', MarcaController::class);
Route::resource('cliente', ClienteController::class);
Route::resource('clientes', ClientesController::class);
Route::resource('ventas', VentaController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/shop', [CartController::class, 'shop'])->name('shop');

Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

Route::post('/ventas', [CartController::class, 'storeVenta'])->name('ventas.store');
