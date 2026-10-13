<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan halaman form login
    public function showLogin() {
        return view('auth.login');
    }

    // Memproses data kredensial saat form login dikirim
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Mengecek kecocokan email dan password dengan database
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Admin maupun User sama-sama diizinkan masuk ke dashboard
            return redirect()->intended('/dashboard');
        }

        // Mengembalikan pesan error jika login gagal
        return back()->withErrors(['email' => 'Email atau Password salah!']);
    }

    // Menampilkan halaman form registrasi akun baru
    public function showRegister() {
        return view('auth.register');
    }

    // Memproses pendaftaran dan penyimpanan akun baru ke database
    public function register(Request $request) {
        // Melakukan validasi input form registrasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Menyimpan data ke tabel users dengan role default 'user'
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Otomatis diset sebagai user biasa
        ]);

        // Mengarahkan kembali ke halaman login setelah registrasi sukses
        return redirect()->route('login')->with('success', 'Registrasi Berhasil! Silakan Login.');
    }

    // Menangani proses keluar (logout) dan menghapus session aktif
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Berhasil Logout!');
    }
}
