<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get('/kategori/guest', [BarangController::class, 'indexGuest'])->name('guest.kategori.index');
Route::get('/about', function () {
    return view('about');
});

Route::middleware('auth')->group(function () {
    Route::get('/barang/{id}/show', [BarangController::class, 'show'])->name('barang.show');


    Route::middleware(['role:user'])->group(function () {
        // home
        Route::get('home', [HomeController::class, 'index'])->name('user.home');

        // detail barang

        // Untuk kategori
        Route::get('/kategori/user', [BarangController::class, 'indexUser'])->name('user.kategori.index');

        // keranjang
        Route::get('/keranjang/{id_barang}/create', [KeranjangController::class, 'create'])->name('keranjang.create');
        Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
        Route::get('/keranjang/checkout', [KeranjangController::class, 'checkout'])->name('keranjang.checkout');
        Route::put('/keranjang/update/{id}', [KeranjangController::class, 'update'])->name('keranjang.update');
        Route::delete('/keranjang/delete/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');


        // pembelian
        Route::post('/pembelian/store', [PembelianController::class, 'store'])->name('pembelian.store');
        Route::get('/pembelian/show/{id_beli}', [PembelianController::class, 'show'])->name('pembelian.show');
        Route::get('/pembelian/user', [PembelianController::class, 'indexUser'])->name('pembelian.user.index');
        Route::get('/payment/{pembelianId}', [PembelianController::class, 'paymentIndex'])->name('payment.index');
        Route::post('/payment/callback', [PembelianController::class, 'callback'])->name('payment.callback');

        // Tambahkan route untuk UserController
        Route::get('/user/profile', [UserController::class, 'userProfile'])->name('user.profile.index');
        Route::get('/user/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit')->middleware('auth');
        Route::put('/user/profile/update', [UserController::class, 'updateProfile'])->name('profile.update')->middleware('auth');

    });
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::resource('barang', BarangController::class)->except('show');
        Route::get('admin/pembelian', [PembelianController::class, 'index'])->name('admin.pembelian.index');
        Route::resource('kategori', KategoriController::class);

        // Tambahkan route untuk UserController
        Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::delete('admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
