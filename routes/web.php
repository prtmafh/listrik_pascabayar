<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
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

Route::middleware(['auth', 'ceklevel:1'])->group(function () {
    // Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/data_admin', [AdminController::class, 'index'])->name('admin.data_admin');
    Route::get('/tambah_data_admin', [AdminController::class, 'TambahAdmin'])->name('admin.data_admin.tambah');
    Route::post('/tambah_data_admin', [AdminController::class, 'TambahAdminPost'])->name('admin.data_admin.tambah.post');
    Route::get('/edit_data_admin/{id}', [AdminController::class, 'EditAdmin'])->name('admin.data_admin.edit');
    Route::put('/update_data_admin/{id}', [AdminController::class, 'UpdateAdmin'])->name('admin.data_admin.update');
    Route::get('/delete_data_admin/{id}', [AdminController::class, 'DeleteAdmin'])->name('admin.data_admin.delete');

    Route::get('/data_petugas', [PetugasController::class, 'index'])->name('admin.data_petugas');
    Route::get('/tambah_data_petugas', [PetugasController::class, 'TambahPetugas'])->name('admin.data_petugas.tambah');
    Route::post('/tambah_data_petugas', [PetugasController::class, 'TambahPetugasPost'])->name('admin.data_petugas.tambah.post');
    Route::get('/edit_data_petugas/{id}', [PetugasController::class, 'EditPetugas'])->name('admin.data_petugas.edit');
    Route::put('/update_data_petugas/{id}', [PetugasController::class, 'UpdatePetugas'])->name('admin.data_petugas.update');
    Route::get('/delete_data_petugas/{id}', [PetugasController::class, 'DeletePetugas'])->name('admin.data_petugas.delete');

    Route::get('/data_pengguna', [PenggunaController::class, 'index'])->name('admin.data_pengguna');
    Route::get('/tambah_data_pengguna', [PenggunaController::class, 'TambahPengguna'])->name('admin.data_pengguna.tambah');
    Route::post('/tambah_data_pengguna', [PenggunaController::class, 'TambahPenggunaPost'])->name('admin.data_pengguna.tambah.post');
    Route::get('/edit_data_pengguna/{id}', [PenggunaController::class, 'EditPengguna'])->name('admin.data_pengguna.edit');
    Route::put('/update_data_pengguna/{id}', [PenggunaController::class, 'UpdatePengguna'])->name('admin.data_pengguna.update');
    Route::get('/delete_data_pengguna/{id}', [PenggunaController::class, 'DeletePengguna'])->name('admin.data_pengguna.delete');

    Route::get('/tarif', [TarifController::class, 'index'])->name('admin.tarif');
    Route::get('/tambah_tarif', [TarifController::class, 'TambahTarif'])->name('admin.tarif.tambah');
    Route::post('/tambah_tarif', [TarifController::class, 'TambahTarifPost'])->name('admin.tarif.tambah.post');
    Route::get('/edit_tarif/{id}', [TarifController::class, 'EditTarif'])->name('admin.tarif.edit');
    Route::put('/update_tarif/{id}', [TarifController::class, 'UpdateTarif'])->name('admin.tarif.update');
    Route::get('/delete_tarif/{id}', [TarifController::class, 'HapusTarif'])->name('admin.tarif.delete');

    Route::get('/penggunaan', [PenggunaanController::class, 'index'])->name('admin.penggunaan');
    Route::post('/penggunaan/generate', [PenggunaanController::class, 'generateBulanIni'])->name('penggunaan.generate');
    Route::get('/edit_penggunaan/{id}', [PenggunaanController::class, 'EditPenggunaan'])->name('admin.penggunaan.edit');
});
Route::middleware(['auth', 'ceklevel:1,2'])->group(
    function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/tagihan', [tagihanController::class, 'index'])->name('admin.tagihan');
        Route::post('/tagihan/generate', [tagihanController::class, 'generate'])->name('tagihan.generate');

        Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('admin.pembayaran');
        Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan');
    }
);
Route::middleware(['auth:pelanggan'])->group(function () {
    Route::get('/pelanggan/dashboard', [PelangganController::class, 'index'])->name('pelanggan.dashboard');
    Route::get('/pelanggan/penggunaan_saya', [PelangganController::class, 'penggunaanSaya'])->name('pelanggan.penggunaan_saya');
    Route::get('/pelanggan/tagihan_saya', [PelangganController::class, 'tagihanSaya'])->name('pelanggan.tagihan_saya');
    Route::get('/pelanggan/riwayat_pembayaran', [PelangganController::class, 'riwayat'])->name('pelanggan.riwayat_pembayaran');
});
