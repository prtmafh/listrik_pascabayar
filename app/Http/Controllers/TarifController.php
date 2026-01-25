<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function index()
    {
        return view('admin.tarif.index');
    }

    public function TambahTarif()
    {
        return view('admin.tarif.tambah');
    }

    public function EditTarif($id)
    {
        return view('admin.tarif.edit');
    }
}
