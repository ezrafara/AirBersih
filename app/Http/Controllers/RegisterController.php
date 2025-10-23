<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    // Menampilkan form registrasi
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Menangani proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'password' => $request->password, // otomatis di-hash oleh cast di User model
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat, silakan login.');
    }
}
