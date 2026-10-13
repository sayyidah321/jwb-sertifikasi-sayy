<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkemaController extends Controller {

    // 1. Menampilkan seluruh daftar data skema sertifikasi ke halaman index
    public function index() {
        $skemas = Skema::all();
        return view('skema.index', compact('skemas'));
    }

    // Menampilkan detail data skema (diarahkan kembali ke index atau tampilkan pesan)
    public function show(Skema $skema) {
        return view('skema.show', compact('skema'));
    }

    // 3. Menampilkan form untuk menambah data skema baru
    public function create() {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }
        return view('skema.create');
    }

    // 4. Memproses penyimpanan data skema baru ke database setelah divalidasi
    public function store(Request $request) {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'kode_skema' => 'required|unique:skemas,kode_skema',
            'nama_skema' => 'required',
            'jenis_skema' => 'required',
            'jumlah_unit' => 'required|numeric'
        ]);

        Skema::create($request->all());
        return redirect()->route('skema.index')->with('success', 'Data Skema Berhasil Ditambahkan!');
    }

    // 5. Menampilkan form untuk mengedit data skema yang sudah ada
    public function edit(Skema $skema) {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }
        return view('skema.edit', compact('skema'));
    }

    // 6. Memperbarui (update) data skema di database setelah divalidasi ulang
    public function update(Request $request, Skema $skema) {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'kode_skema' => 'required|unique:skemas,kode_skema,' . $skema->id,
            'nama_skema' => 'required',
            'jenis_skema' => 'required',
            'jumlah_unit' => 'required|numeric'
        ]);

        $skema->update($request->all());
        return redirect()->route('skema.index')->with('success', 'Data Skema Berhasil Diperbarui!');
    }

    // 7. Menghapus data skema dari database
    public function destroy(Skema $skema) {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $skema->delete();
        return redirect()->route('skema.index')->with('success', 'Data Skema Berhasil Dihapus!');
    }
}
