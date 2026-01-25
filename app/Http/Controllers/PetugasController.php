<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        return view('admin.data_petugas.index');
    }

    public function TambahPetugas()
    {
        return view('admin.data_petugas.tambah');
    }
    public function EditPetugas($id)
    {
        return view('admin.data_petugas.edit');
    }
}
