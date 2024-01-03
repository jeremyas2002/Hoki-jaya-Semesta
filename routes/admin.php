<?php

use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PesanMasukController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SocmedController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('change-password.index');
Route::post('/change-password', [ChangePasswordController::class, 'update'])->name('change-password.update');

// kategori
Route::resource('kategori', KategoriController::class)->except('show');

// users
Route::resource('users', UserController::class)->except('show');
// pesan-masuk
Route::resource('pesan-masuk', PesanMasukController::class)->only(['index', 'destroy']);
// testimoni
Route::resource('testimoni', TestimoniController::class)->except('show');

// artikel
Route::resource('artikel', ArtikelController::class);

// produk
Route::resource('produk', ProdukController::class);

// galeri
Route::resource('galeri', GaleriController::class);

// bank
Route::resource('bank', BankController::class)->except('show');

// transaksi
Route::resource('transaksi', TransaksiController::class)->except(['create', 'store']);
