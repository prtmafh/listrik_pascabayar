<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penggunaan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenggunaanController extends Controller
{
    public function index()
    {
        $data = Penggunaan::with('pelanggan')
            ->orderBy('tahun', 'desc')
            ->orderByRaw("FIELD(bulan, 
        'December', 'November', 'October', 'September', 'August', 'July',
        'June', 'May', 'April', 'March', 'February', 'January')")
            ->orderBy('id_penggunaan', 'desc')
            ->get();


        return view('admin.penggunaan.index', compact('data'));
    }

    public function EditPenggunaan(Request $request, Penggunaan $penggunaan)
    {
        $request->validate([
            'meter_akhir' => 'required|integer|min:0',
        ]);

        if ($request->meter_akhir < $penggunaan->meter_awal) {
            return redirect()->route('penggunaan.index')->with('error', 'Meter akhir tidak boleh lebih kecil dari meter awal.');
        }

        $penggunaan->update([
            'meter_akhir' => $request->meter_akhir,
        ]);

        return redirect()->back()->with('success', 'Meter akhir berhasil diperbarui.');
    }

    public function generateBulanIni()
    {
        $bulan = Carbon::now()->translatedFormat('F');
        $tahun = Carbon::now()->year;
        $count = 0;

        $pelanggans = Pelanggan::all();

        foreach ($pelanggans as $p) {
            $sudahAda = Penggunaan::where('id_pelanggan', $p->id_pelanggan)
                ->where('bulan', $bulan)
                ->where('tahun', $tahun)
                ->exists();

            if (!$sudahAda) {
                $terakhir = Penggunaan::where('id_pelanggan', $p->id_pelanggan)
                    ->orderByDesc('tahun')
                    ->orderByDesc('bulan')
                    ->first();

                $meter_awal = $terakhir && $terakhir->meter_akhir !== null
                    ? $terakhir->meter_akhir
                    : 0;

                Penggunaan::create([
                    'id_pelanggan' => $p->id_pelanggan,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'meter_awal' => $meter_awal,
                    'meter_akhir' => null,
                ]);

                $count++;
            }
        }
        if ($count == 0) {
            return redirect()->back()->with('error', 'Tidak ada data penggunaan baru untuk digenerate.');
        }
        return redirect()->back()->with('success', "$count data penggunaan berhasil dibuat untuk bulan $bulan $tahun.");
    }
}
