<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PembelianController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware('auth')->group(function () {
    Route::middleware(['role:user'])->group(function () {
        // home
        Route::get('home', [HomeController::class, 'index'])->name('user.home');

        // detail barang
        Route::get('/barang/{id}/show', [BarangController::class, 'show'])->name('barang.show');

        // keranjang
        Route::get('/keranjang/{id_barang}/create', [KeranjangController::class, 'create'])->name('keranjang.create');
        Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
        Route::get('/keranjang/checkout', [KeranjangController::class, 'checkout'])->name('keranjang.checkout');
        Route::put('/keranjang/update/{id}', [KeranjangController::class, 'update'])->name('keranjang.update');
        Route::delete('/keranjang/delete/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');


        // pembelian
        Route::post('/pembelian/store', [PembelianController::class, 'store'])->name('pembelian.store');
        Route::get('/payment/{pembelianId}', [PembelianController::class, 'paymentIndex'])->name('payment.index');
        Route::post('/payment/callback', [PembelianController::class, 'callback'])->name('payment.callback');


    });
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::resource('barang', BarangController::class)->except('show');
        Route::resource('kategori', KategoriController::class);
    });
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
