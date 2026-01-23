<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\PenggunaanController;
use App\Http\Controllers\tagihanController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.form');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/data_admin', [AdminController::class, 'index'])->name('admin.data_admin');
    Route::get('/tambah_data_admin', [AdminController::class, 'TambahAdmin'])->name('admin.data_admin.tambah');

    Route::get('/data_petugas', [PetugasController::class, 'index'])->name('admin.data_petugas');
    Route::get('/tambah_data_petugas', [PetugasController::class, 'TambahPetugas'])->name('admin.data_petugas.tambah');

    Route::get('/data_pengguna', [PenggunaController::class, 'index'])->name('admin.data_pengguna');
    Route::get('/tambah_data_pengguna', [PenggunaController::class, 'TambahPengguna'])->name('admin.data_pengguna.tambah');

    Route::get('/tarif', [TarifController::class, 'index'])->name('admin.tarif');
    Route::get('/tambah_tarif', [TarifController::class, 'TambahTarif'])->name('admin.tarif.tambah');

    Route::get('/penggunaan', [PenggunaanController::class, 'index'])->name('admin.penggunaan');

    Route::get('/tagihan', [tagihanController::class, 'index'])->name('admin.tagihan');

    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('admin.pembayaran');
});
