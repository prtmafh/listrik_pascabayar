<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tagihanController extends Controller
{
    public function index()
    {
        return view('admin.tagihan.index');
    }
}
