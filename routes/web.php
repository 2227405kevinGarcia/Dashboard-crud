<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
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

Route::get('/productos', [ProductosController::class, 'index'])->name('productos');
Route::get('/producto/create', [ProductosController::class, 'create'])->name('producto.create');
Route::post('/producto/store', [ProductosController::class, 'store'])->name('producto.store');
Route::get('/producto/edit/{id}', [ProductosController::class, 'edit'])->name('producto.edit');
Route::post('/producto/update/{id}', [ProductosController::class, 'update'])->name('producto.update');
Route::delete('/producto/delete/{id}', [ProductosController::class, 'destroy'])->name('producto.delete');
Route::get('/producto/show/{id}', [ProductosController::class, 'show'])->name('producto.show');

Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias');
Route::get('/categoria/create', [CategoriasController::class, 'create'])->name('categoria.create');
Route::post('/categoria/store', [CategoriasController::class, 'store'])->name('categoria.store');
Route::get('/categoria/edit/{id}', [CategoriasController::class, 'edit'])->name('categoria.edit');
Route::post('/categoria/update/{id}', [CategoriasController::class, 'update'])->name('categoria.update');
Route::delete('/categoria/delete/{id}', [CategoriasController::class, 'destroy'])->name('categoria.delete');
Route::get('/categoria/show/{id}', [CategoriasController::class, 'show'])->name('categoria.show');

Route::get('/tienda', [ProductosController::class, 'index'])->name('tienda');
