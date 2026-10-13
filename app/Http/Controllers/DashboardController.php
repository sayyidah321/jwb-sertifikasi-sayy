<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;

class DashboardController extends Controller {
    public function index() {
        // Menghitung total jumlah seluruh peserta yang terdaftar di database
        $totalPeserta = Peserta::count();
        // Menghitung total jumlah seluruh skema sertifikasi di database
        $totalSkema = Skema::count();
        // Mengambil 5 data peserta terbaru yang mendaftar lengkap dengan relasi ke tabel skema
        $pesertaTerbaru = Peserta::with('skema')->latest()->take(5)->get();
        // Mengirimkan data statistik dan tabel peserta terbaru ke tampilan view 'dashboard'
        return view('dashboard', compact('totalPeserta', 'totalSkema', 'pesertaTerbaru'));
    }
}
