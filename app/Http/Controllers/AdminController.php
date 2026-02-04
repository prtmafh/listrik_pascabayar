<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where('id_level', 1)->get();
        return view('admin.data_admin.index', compact('admins'));
    }

    public function TambahAdmin()
    {
        return view('admin.data_admin.tambah');
    }

    public function TambahAdminPost(Request $request)
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
        return redirect()->route('admin.data_admin')->with('success', 'Data admin berhasil ditambahkan!');
    }

    public function EditAdmin($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.data_admin.edit', compact('admin'));
    }

    public function UpdateAdmin(Request $request, $id)
    {
        $request->validate([
            'nama_admin' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id . ',id_user',
            'password' => 'nullable|string|min:6',
        ]);
        $admin = User::findOrFail($id);
        $admin->update([
            'nama_admin' => $request->nama_admin,
            'username' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $admin->password,
            'id_level' => 1,
        ]);
        return redirect()->route('admin.data_admin')->with('success', 'Data admin berhasil diubah!');
    }

    public function DeleteAdmin($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();
        return redirect()->route('admin.data_admin')->with('success', 'Data admin berhasil dihapus!');
    }
}
