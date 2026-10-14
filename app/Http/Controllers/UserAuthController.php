<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Atau model Peserta jika tabel user-nya digabung

class UserAuthController extends Controller
{
    // Tampilkan form login user
    public function showLoginForm()
    {
        return view('auth.user_login');
    }

    // Proses login user
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Pastikan mengarah ke user-dashboard
        return redirect()->intended('/user-dashboard');
    }

    return back()->withErrors([
        'email' => 'Email atau password yang dimasukkan salah.',
    ])->onlyInput('email');
}

    // Proses logout user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/user-login');
    }
}