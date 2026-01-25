<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaanController extends Controller
{
    public function index()
    {
        return view('admin.penggunaan.index');
    }

    public function EditPenggunaan($id)
    {
        return view('admin.penggunaan.edit');
    }
}
