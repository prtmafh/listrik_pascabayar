<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $admins = User::where('id_level', 2)->get();
        return view('admin.data_petugas.index', compact('admins'));
        // return view('admin.data_petugas.index');
    }

    public function TambahPetugas()
    {
        return view('admin.data_petugas.tambah');
    }
    public function TambahPetugasPost(Request $request)
    {
        $request->validate([
            'nama_admin' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6',
            'id_level' => 'required|exists:level,id_level',
        ]);

        User::create([
            'nama_admin' => $request->nama_admin,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'id_level' => $request->id_level,
        ]);
        return redirect()->route('admin.data_petugas')->with('success', 'Data petugas berhasil ditambahkan!');
    }
    public function EditPetugas($id)
    {
        return view('admin.data_petugas.edit');
    }
}
