<?php

namespace App\Http\Controllers;

use App\Models\Penggunaan;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class tagihanController extends Controller
{
    public function index()
    {
        $data = Tagihan::with(['penggunaan.pelanggan', 'pelanggan'])
            ->where('status', 'belum bayar')
            ->orderBy('tahun', 'desc')
            ->orderByRaw("FIELD(bulan, 'December', 'November', 'October', 'September', 'August', 'July',
        'June', 'May', 'April', 'March', 'February', 'January')")->orderBy('id_tagihan', 'desc')
            ->get();
        return view('admin.tagihan.index', compact('data'));
    }
    public function generate()
    {
        $penggunaan = Penggunaan::with(['pelanggan.tarif']) // include tarif dari pelanggan
            ->whereNotNull('meter_akhir')
            ->whereNotIn('id_penggunaan', function ($query) {
                $query->select('id_penggunaan')->from('tagihan');
            })
            ->get();

        if ($penggunaan->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data tagihan baru untuk digenerate.');
        }

        foreach ($penggunaan as $p) {
            $jumlah = $p->meter_akhir - $p->meter_awal;

            // Ambil tarif per kWh dari relasi pelanggan -> tarif
            // $tarif_per_kwh = floatval($p->pelanggan->tarif->tarifperkwh ?? 0);
            // $total = $jumlah * $tarif_per_kwh;

            Tagihan::create([
                'id_penggunaan' => $p->id_penggunaan,
                'id_pelanggan' => $p->id_pelanggan,
                'bulan' => $p->bulan,
                'tahun' => $p->tahun,
                'jumlah_meter' => $jumlah,
                'status' => 'belum bayar',
                // 'total_bayar' => $total
            ]);
        }

        return redirect()->back()->with('success', 'Tagihan berhasil digenerate!');
    }
}
