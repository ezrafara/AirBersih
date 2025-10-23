<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Halaman dashboard, wajib login (middleware auth sudah di-route)
    public function index()
    {
        return view('dashboard');
    }
}
