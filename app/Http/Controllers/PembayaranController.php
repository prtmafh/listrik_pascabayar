<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index($id_tagihan)
    {
        $tagihan = Tagihan::with(['pelanggan.tarif'])->findOrFail($id_tagihan);

        return view('admin.pembayaran.index', compact('tagihan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tagihan' => 'required|exists:tagihan,id_tagihan',
            'biaya_admin' => 'required|numeric|min:0',
            'tanggal_pembayaran' => 'required|date',
        ]);

        $tagihan = Tagihan::with(['pelanggan.tarif'])->findOrFail($request->id_tagihan);

        // Hitung ulang total tagihan berdasarkan tarif per kWh
        $jumlah_meter = $tagihan->jumlah_meter;
        $tarif_per_kwh = $tagihan->pelanggan->tarif->tarifperkwh ?? 0;
        $total_tagihan = $jumlah_meter * $tarif_per_kwh;

        // Hitung total akhir
        $total_bayar = $total_tagihan + $request->biaya_admin;

        Pembayaran::create([
            'id_tagihan' => $tagihan->id_tagihan,
            'id_pelanggan' => $tagihan->id_pelanggan,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'bulan_bayar' => $tagihan->bulan,
            'biaya_admin' => $request->biaya_admin,
            'total_bayar' => $total_bayar,
            'id_user' => Auth::id(),
        ]);


        $tagihan->update(['status' => 'sudah bayar']);

        return redirect()->route('admin.tagihan')->with('success', 'Pembayaran berhasil disimpan');
    }
}
