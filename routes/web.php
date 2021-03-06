<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\{AuthController};

use App\Http\Controllers\{
    homeController,produkController,customerController,
    transaksiController,userController
};


Route::get('/',[homeController::class,'indexCustomer']);


/* Authentication Admin */
Route::get('login',[AuthController::class,'index']);
Route::post('login',[AuthController::class,'process'])->name('login');
Route::post('logout',[AuthController::class,'logout'])->name('logout');

/* Authentication Customer */
Route::get('login/customer',[AuthController::class,'indexLoginCustomer']);
Route::post('login/customer',[AuthController::class,'processLoginCustomer'])->name('login.customer');
Route::get('register/customer',[AuthController::class,'indexRegisterCustomer']);
Route::post('register/customer',[AuthController::class,'processRegisterCustomer'])->name('register.customer');
Route::get('logout/customer',[AuthController::class,'logoutCustomer']);

/* Shopping */
Route::get('produk/view/{uuid}',[transaksiController::class,'viewProduk']);

/* Dashboard */
Route::get('home/customer',[homeController::class,'indexCustomer']);
Route::get('cari/{merk}',[homeController::class,'cariProduk']);

Route::get('produk/add/cart/{uuid}',[transaksiController::class,'addCart']);

/* customer dashboard */
Route::middleware(['customer'])->group(function () {
    
    /* Profile */
    Route::get('customer/profile',[customerController::class,'profileCustomer']);
    Route::post('customer/profile',[customerController::class,'profileCustomerUpdate']);
    Route::post('update/avatar',[customerController::class,'updateAvatar']);
    
    /* cart */
    Route::get('cart',[transaksiController::class,'indexCart']);
    Route::get('hapus/cart/{id}',[transaksiController::class,'hapusCart']);

    /* Order */
    Route::get('transaksi',[transaksiController::class,'indexTransaksi']);
    Route::post('konfirmasi/order',[transaksiController::class,'orderConfirmation'])->name('konfirmasi.order');
    Route::get('transaksi/pdf/{id}',[transaksiController::class,'pdfTransaksi']);
    Route::post('transaksi/upload/bukti',[transaksiController::class,'uploadBukti']);
    Route::get('transaksi/konfirmasi/{id}',[transaksiController::class,'konfirmasiProduk']);
});

Route::get('transaksi/produk/{id}',[transaksiController::class,'produkAmbil']);


/* admin dashboard */
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

    /* Pelanggan */
    Route::get('pelanggan',[customerController::class,'index']);
    Route::get('pelanggan/detail/{uuid}',[customerController::class,'detailCustomer']);

    /* transaksi */
    Route::prefix('transaksi/admin')->group(function () {
        
        /* baru */
        Route::get('baru',[transaksiController::class,'indexAdminBaru']);
        Route::post('baru',[transaksiController::class,'simpanPengirimanBarang']);

        /* Kirim */
        Route::get('terkirim',[transaksiController::class,'indexAdminKirim']);

        /* Selesai */
        Route::get('selesai',[transaksiController::class,'indexAdminSelesai']);
    });

     /* ubah profile dan Password */
    Route::get('ubah/password',[userController::class,'ubahPassword']);
    Route::post('simpan/ubahPassword',[userController::class,'simpanUbahPassword'])->name('simpan.ubahPassword');
    Route::get('ubah/profile',[userController::class,'ubahProfile']);
    Route::post('simpan/user/profile',[userController::class,'simpanUbahProfile'])->name('simpan.user.ubah');

});





