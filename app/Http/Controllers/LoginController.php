<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect sesuai role
            $role = auth()->user()->role;
            if ($role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } elseif ($role === 'member') {
                return redirect()->intended('/member/dashboard');
            }
            // Jika role tidak dikenali, redirect ke halaman utama
            return redirect('/');
        }

        return back()->withErrors([
            'name' => 'Nama atau password salah',
        ])->onlyInput('name');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
