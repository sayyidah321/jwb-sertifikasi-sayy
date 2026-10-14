<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserSkemaController;
use App\Http\Controllers\UserPesertaController;

// 1. Halaman Welcome
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// 2. Route Login Admin / Utama
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// 3. Route Registrasi Akun Baru
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

// 4. Route Login Khusus User (Diletakkan di luar middleware auth)
Route::get('/user-login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
Route::post('/user-login', [UserAuthController::class, 'login'])->name('user.login.submit');

// 5. Route yang Wajib Login (Protected)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/user-logout', [AuthController::class, 'logout'])->name('user.logout');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('skema', SkemaController::class);
    
    // Resource Peserta
    Route::resource('peserta', PesertaController::class)->parameters([
        'peserta' => 'peserta'
    ]);

    // Rute Dashboard Khusus User
    Route::get('/user-dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

    // Rute Khusus User untuk Skema
    Route::get('/user-skema', [UserSkemaController::class, 'index'])->name('user.skema');
    Route::post('/user-skema', [UserSkemaController::class, 'store'])->name('user.skema.store');
    Route::get('/user-skema/{id}/edit', [UserSkemaController::class, 'edit'])->name('user.skema.edit');
    Route::put('/user-skema/{id}', [UserSkemaController::class, 'update'])->name('user.skema.update');
    Route::delete('/user-skema/{id}', [UserSkemaController::class, 'destroy'])->name('user.skema.destroy');

    // Rute Khusus User untuk Peserta
Route::get('/user-peserta', [UserPesertaController::class, 'index'])->name('user.peserta');
Route::post('/user-peserta', [UserPesertaController::class, 'store'])->name('user.peserta.store');
Route::get('/user-peserta/{id}', [UserPesertaController::class, 'show'])->name('user.peserta.show');
Route::get('/user-peserta/{id}/edit', [UserPesertaController::class, 'edit'])->name('user.peserta.edit');
Route::put('/user-peserta/{id}', [UserPesertaController::class, 'update'])->name('user.peserta.update');
Route::delete('/user-peserta/{id}', [UserPesertaController::class, 'destroy'])->name('user.peserta.destroy');
});