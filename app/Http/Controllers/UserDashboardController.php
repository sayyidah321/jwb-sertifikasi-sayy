<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Skema;
use App\Models\Peserta;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Menggunakan data langsung dari akun yang sedang login
        $pesertaData = (object) [
            'nama' => $user->name,
            'email' => $user->email,
            'status' => 'Terdaftar (Menunggu Asesmen)'
        ];

        // Ambil semua data skema sertifikasi
        $skemas = Skema::all();

        return view('user.dashboard', compact('pesertaData', 'skemas'));
    }
}