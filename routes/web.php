<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\{AuthController};

use App\Http\Controllers\{homeController,produkController};


Route::get('/', function () {
    return view('welcome');
});


/* Authentication Admin */
Route::get('login',[AuthController::class,'index']);
Route::post('login',[AuthController::class,'process'])->name('login');
Route::post('logout',[AuthController::class,'logout'])->name('logout');

/* Authentication Customer */
Route::get('login/customer',[AuthController::class,'indexLoginCustomer']);
Route::get('register/customer',[AuthController::class,'indexRegisterCustomer']);

Route::middleware(['auth'])->group(function () {
    /* Dashboard */
    Route::get('home',[homeController::class,'index'])->name('home');

    Route::prefix('produk')->group(function () {

        /* Merek */
        Route::get('merk',[produkController::class,'indexMerk']);
        Route::post('merk/simpan',[produkController::class,'simpanMerk'])->name('simpan.merk');

        /* Produk Merek */
        Route::get('',[produkController::class,'indexProduk']);
        Route::get('table',[produkController::class,'dataProduk'])->name('table.produk');
        Route::get('ambil/{id}',[produkController::class,'ambilProduk']);
        Route::post('simpan',[produkController::class,'simpanProduk'])->name('simpan.produk');
        Route::post('simpan/produk',[produkController::class,'simpanProdukStok'])->name('simpan.stok.produk');
       
    });

    /* Banner Produk */
    Route::get('banner',[produkController::class,'indexBanner']);
    
});





