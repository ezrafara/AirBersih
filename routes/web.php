<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AdminController;

// Halaman utama bisa diakses semua orang (user/guest)
Route::get('/', function () {
    return view('welcome');
});

// Route untuk registrasi
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route untuk login/logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Halaman dashboard lama untuk user login biasa (boleh hapus kalau sudah tidak dipakai)
// Route::get('/dashboard', [DashboardController::class, 'index'])
//     ->middleware('auth')
//     ->name('dashboard');

// Dashboard untuk member
Route::middleware(['auth', 'role:member'])->group(function () {
    Route::get('/member/dashboard', [MemberController::class, 'index'])->name('member.dashboard');
});

// Dashboard untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
