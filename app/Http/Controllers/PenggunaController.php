<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penggunaan;
use App\Models\Tarif;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('admin.data_pengguna.index', compact('pelanggans'));
    }

    public function TambahPengguna()
    {
        $tarif = Tarif::all();
        return view('admin.data_pengguna.tambah', compact('tarif'));
    }

    public function TambahPenggunaPost(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:pelanggan',
            'password' => 'required',
            'nomor_kwh' => 'required|unique:pelanggan',
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'id_tarif' => 'required|exists:tarif,id_tarif'
        ]);

        // Simpan pelanggan
        $pelanggan = Pelanggan::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nomor_kwh' => $request->nomor_kwh,
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'id_tarif' => $request->id_tarif
        ]);

        // Siapkan informasi bulan & tahun saat ini
        $bulan = Carbon::now()->translatedFormat('F'); // Misal: Juli
        $tahun = Carbon::now()->year;

        // Cek apakah sudah ada data penggunaan bulan ini
        $sudahAda = Penggunaan::where('id_pelanggan', $pelanggan->id_pelanggan)
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->exists();

        // Jika belum ada, buat data penggunaan awal
        if (!$sudahAda) {
            Penggunaan::create([
                'id_pelanggan' => $pelanggan->id_pelanggan,
                'bulan' => $bulan,
                'tahun' => $tahun,
                'meter_awal' => 0,
                'meter_akhir' => null,
            ]);
        }

        return redirect()->route('admin.data_pengguna')->with('success', 'Data pengguna berhasil ditambahkan!');
    }

    public function EditPengguna($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $tarif = Tarif::all();
        return view('admin.data_pengguna.edit', compact('pelanggan', 'tarif'));
    }

    public function UpdatePengguna(Request $request, $id)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'nomor_kwh' => 'required|string|max:50|unique:pelanggan,nomor_kwh,' . $id . ',id_pelanggan',
            'id_tarif' => 'required|exists:tarif,id_tarif',
            'username' => 'required|string|max:255|unique:pelanggan,username,' . $id . ',id_pelanggan',
            'password' => 'nullable|string|min:6',
        ]);
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'nomor_kwh' => $request->nomor_kwh,
            'id_tarif' => $request->id_tarif,
            'username' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $pelanggan->password,
        ]);
        return redirect()->route('admin.data_pengguna')->with('success', 'Data pengguna berhasil diubah!');
    }

    public function DeletePengguna($id)
    {
        Pelanggan::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data pengguna berhasil dihapus!');
    }
}
