<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;

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

Route::group(['prefix' => 'clientes'], function () {
    Route::get('/', [ClientController::class, 'index'])->name('clients.index');
//Route::get('/clientes/(id}', [clientController::class, 'show']);
    Route::get('/criar', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/editar/{id}', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
//Route::get('/clientes/(id}', [clientController::class, 'show']);
    Route::get('/criar', [ProductController::class, 'create'])->name('products.create');
    Route::post('/', [ProductController::class, 'store'])->name('products.store');
    Route::get('/editar/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});




Route::get('/', function () {
    return view('welcome');
});
