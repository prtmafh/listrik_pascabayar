<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login'); // satu halaman login
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Coba login sebagai user (admin/petugas)
        $user = User::where('username', $credentials['username'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::guard('web')->login($user);
            return redirect()->intended('/admin/dashboard');
        }

        // Coba login sebagai pelanggan
        $pelanggan = Pelanggan::where('username', $credentials['username'])->first();
        if ($pelanggan && Hash::check($credentials['password'], $pelanggan->password)) {
            Auth::guard('pelanggan')->login($pelanggan);
            return redirect()->intended('/dashboard/pelanggan/pelanggan');
        }

        return back()->withErrors([
            'login_error' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        } elseif (Auth::guard('pelanggan')->check()) {
            Auth::guard('pelanggan')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
