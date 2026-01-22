<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    // public function DataAdmin()
    // {
    //     return view('admin.data_admin.index');
    // }
    // public function DataPetugas()
    // {
    //     return view('admin.data_petugas.index');
    // }
}
