<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $query = Pembayaran::with(['tagihan.pelanggan']);

        if ($bulan) {
            $query->whereHas('tagihan', function ($q) use ($bulan) {
                $q->where('bulan', $bulan);
            });
        }

        if ($tahun) {
            $query->whereHas('tagihan', function ($q) use ($tahun) {
                $q->where('tahun', $tahun);
            });
        }
        $query->whereHas('tagihan')
            ->orderByRaw("FIELD(bulan_bayar, 'December', 'November', 'October', 'September', 'August', 'July', 'June', 'May', 'April', 'March', 'February', 'January')")
            ->orderBy('pembayaran.id_pembayaran', 'desc');

        $pembayaran = $query->get();
        return view('admin.laporan.index', compact('pembayaran', 'bulan', 'tahun'));
    }
}
