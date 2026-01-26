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
use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.form');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/data_admin', [AdminController::class, 'index'])->name('admin.data_admin');
    Route::get('/tambah_data_admin', [AdminController::class, 'TambahAdmin'])->name('admin.data_admin.tambah');
    Route::get('/edit_data_admin/{id}', [AdminController::class, 'EditAdmin'])->name('admin.data_admin.edit');

    Route::get('/data_petugas', [PetugasController::class, 'index'])->name('admin.data_petugas');
    Route::get('/tambah_data_petugas', [PetugasController::class, 'TambahPetugas'])->name('admin.data_petugas.tambah');
    Route::get('/edit_data_petugas/{id}', [PetugasController::class, 'EditPetugas'])->name('admin.data_petugas.edit');

    Route::get('/data_pengguna', [PenggunaController::class, 'index'])->name('admin.data_pengguna');
    Route::get('/tambah_data_pengguna', [PenggunaController::class, 'TambahPengguna'])->name('admin.data_pengguna.tambah');

    Route::get('/tarif', [TarifController::class, 'index'])->name('admin.tarif');
    Route::get('/tambah_tarif', [TarifController::class, 'TambahTarif'])->name('admin.tarif.tambah');
    Route::get('/edit_tarif/{id}', [TarifController::class, 'EditTarif'])->name('admin.tarif.edit');

    Route::get('/penggunaan', [PenggunaanController::class, 'index'])->name('admin.penggunaan');
    Route::get('/edit_penggunaan/{id}', [PenggunaanController::class, 'EditPenggunaan'])->name('admin.penggunaan.edit');

    Route::get('/tagihan', [tagihanController::class, 'index'])->name('admin.tagihan');

    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('admin.pembayaran');
});
Route::middleware(['auth:pelanggan'])->group(function () {
    Route::get('/pelanggan/dashboard', [PelangganController::class, 'index'])->name('pelanggan.dashboard');
    Route::get('/pelanggan/penggunaan_saya', [PelangganController::class, 'penggunaanSaya'])->name('pelanggan.penggunaan_saya');
    Route::get('/pelanggan/tagihan_saya', [PelangganController::class, 'tagihanSaya'])->name('pelanggan.tagihan_saya');
    Route::get('/pelanggan/riwayat_pembayaran', [PelangganController::class, 'riwayat'])->name('pelanggan.riwayat_pembayaran');
});
