<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\TransaksiController;


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

Route::get('/', [FrontController::class, 'tampil']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//route admin
Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin|member']],
    function ( ) {
        Route::get('/', function () {
            return view ('kategori.index');
        })->middleware(['role:admin|member']);
    });
    Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin|member']],
    function ( ) {
        Route::get('/', function () {
            return view ('barang.index');
        })->middleware(['role:admin|member']);
    });
    Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin|member']],
    function ( ) {
        Route::get('/', function () {
            return view ('keranjang.index');
        })->middleware(['role:admin|member']);
    });
    Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin|member']],
    function ( ) {
        Route::get('/', function () {
            return view ('order.index');
        })->middleware(['role:admin|member']);
    });
    Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin|member']],
    function ( ) {
        Route::get('/', function () {
            return view ('transaksi.index');
        })->middleware(['role:admin|member']);
    });

    Route::resource('kategori', KategoriController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('keranjang', KeranjangController::class);
    Route::resource('order', OrderController::class);
    Route::resource('transaksi', TransaksiController::class);