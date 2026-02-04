<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function index()
    {
        $tarif = Tarif::all();
        return view('admin.tarif.index', compact('tarif'));
    }

    public function TambahTarif()
    {
        return view('admin.tarif.tambah');
    }

    public function TambahTarifPost(Request $request)
    {
        $request->validate([
            'daya' => 'required|integer',
            'tarifperkwh' => 'required|integer',
        ]);

        Tarif::create([
            'daya' => $request->daya,
            'tarifperkwh' => $request->tarifperkwh,
        ]);

        return redirect()->route('admin.tarif')->with('success', 'Data tarif berhasil ditambahkan!');
    }

    public function EditTarif($id)
    {
        $tarif = Tarif::findOrFail($id);
        return view('admin.tarif.edit', compact('tarif'));
    }

    public function UpdateTarif(Request $request, $id)
    {
        $request->validate([
            'daya' => 'required|integer',
            'tarifperkwh' => 'required|integer',
        ]);

        $tarif = Tarif::findOrFail($id);
        $tarif->update([
            'daya' => $request->daya,
            'tarifperkwh' => $request->tarifperkwh,
        ]);

        return redirect()->route('admin.tarif')->with('success', 'Data tarif berhasil diubah!');
    }

    public function HapusTarif($id)
    {
        $tarif = Tarif::findOrFail($id);
        $tarif->delete();
        return redirect()->route('admin.tarif')->with('success', 'Data tarif berhasil dihapus!');
    }
}
