<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.data_admin.index');
    }

    public function TambahAdmin()
    {
        return view('admin.data_admin.tambah');
    }
}
