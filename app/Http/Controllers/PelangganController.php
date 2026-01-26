<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        return view('pelanggan.dashboard');
    }

    public function penggunaanSaya()
    {
        return view('pelanggan.penggunaan_saya.index');
    }

    public function tagihanSaya()
    {
        return view('pelanggan.tagihan_saya.index');
    }

    public function riwayat()
    {
        return view('pelanggan.riwayat.index');
    }
}
