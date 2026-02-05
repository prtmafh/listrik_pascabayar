<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Penggunaan;
use App\Models\Tagihan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPetugas = User::where('id_level', 2)->count();
        $jumlahPelanggan = Pelanggan::get()->count();
        $jumlahPelanggan = Pelanggan::count();
        $jumlahPetugas = User::where('id_level', 2)->count();

        $bulanIni = now()->format('F');
        $tahunIni = now()->format('Y');

        $jumlahTagihan = Tagihan::where('bulan', $bulanIni)->where('tahun', $tahunIni)->where('status', 'belum bayar')->count();
        $jumlahPembayaran = Pembayaran::count();

        $jumlahPenggunaan = Penggunaan::count();
        return view('admin.dashboard', compact('jumlahPetugas', 'jumlahPelanggan', 'jumlahTagihan', 'jumlahPembayaran', 'jumlahPenggunaan'));
    }
    // public function DataAdmin()
    // {
    //     return view('admin.data_admin.index');
    // }
    // public function DataPetugas()
    // {
    //     return view('admin.data_petugas.index');
    // }
}
