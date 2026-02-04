<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Tarif;
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
            'nama_pelanggan' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'nomor_kwh' => 'required|string|max:50|unique:pelanggan,nomor_kwh',
            'id_tarif' => 'required|exists:tarif,id_tarif',
            'username' => 'required|string|max:255|unique:pelanggan,username',
            'password' => 'required|string|min:6',
        ]);
        pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'nomor_kwh' => $request->nomor_kwh,
            'id_tarif' => $request->id_tarif,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
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
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return redirect()->route('admin.data_pengguna')->with('success', 'Data pengguna berhasil dihapus!');
    }
}
