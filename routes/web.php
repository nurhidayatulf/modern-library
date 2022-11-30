<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/index_kategori', [KategoriController::class, 'index']);
    Route::get('/create_kategori', [KategoriController::class, 'create']);
    Route::post('/index_kategori', [KategoriController::class, 'store']);
    Route::get('/edit_kategori/{id}', [KategoriController::class, 'edit']);
    Route::put('/index_kategori/{id}', [KategoriController::class, 'update']);
    Route::get('/delete_kategori/{id}', [KategoriController::class, 'destroy']);

    Route::get('/index_buku', [BukuController::class, 'index']);
    Route::get('/create_buku', [BukuController::class, 'create']);
    Route::post('/index_buku', [BukuController::class, 'store']);
    Route::get('/edit_buku/{id}', [BukuController::class, 'edit']);
    Route::put('/index_buku/{id}', [BukuController::class, 'update']);
    Route::get('/delete_buku/{id}', [BukuController::class, 'destroy']);
    Route::get('/akses/{id}', [BukuController::class, 'akses']);
    Route::get('/home', [BukuController::class, 'home'])->middleware('admin');


});