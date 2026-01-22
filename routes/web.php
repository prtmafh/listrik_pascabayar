<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
});
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
Route::get('/data_admin', function () {
    return view('admin.data_admin.index');
})->name('admin.data_admin');
Route::get('/data_petugas', function () {
    return view('admin.data_petugas.index');
})->name('admin.data_petugas');
Route::get('/data_pengguna', function () {
    return view('admin.data_pengguna.index');
})->name('admin.data_pengguna');
Route::get('/tarif', function () {
    return view('admin.tarif.index');
})->name('admin.tarif');
Route::get('/tambah_data_admin', function () {
    return view('admin.data_admin.tambah');
})->name('admin.data_admin.tambah');
Route::get('/tambah_data_petugas', function () {
    return view('admin.data_petugas.tambah');
})->name('admin.data_petugas.tambah');
Route::get('/tambah_data_pengguna', function () {
    return view('admin.data_pengguna.tambah');
})->name('admin.data_pengguna.tambah');
