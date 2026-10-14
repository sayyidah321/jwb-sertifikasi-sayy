<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skema;

class UserSkemaController extends Controller
{
    // Menampilkan halaman data skema versi user
    public function index()
    {
        $skemas = Skema::all();
        $editSkema = null;
        return view('user.skema_index', compact('skemas', 'editSkema'));
    }

    // Menyimpan data skema baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_skema' => 'required|string|max:255',
            'nama_skema' => 'required|string|max:255',
        ]);

        Skema::create([
            'kode_skema' => $request->kode_skema,
            'nama_skema' => $request->nama_skema,
            'jenis_skema' => 'Okupasi',
            'jumlah_unit' => 1,
        ]);

        return redirect()->route('user.skema')->with('success', 'Skema berhasil ditambahkan!');
    }

    // Menampilkan form untuk edit data skema
    public function edit($id)
    {
        $skemas = Skema::all();
        $editSkema = Skema::findOrFail($id);
        return view('user.skema_index', compact('skemas', 'editSkema'));
    }

    // Memperbarui data skema
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_skema' => 'required|string|max:255',
            'nama_skema' => 'required|string|max:255',
        ]);

        $skema = Skema::findOrFail($id);
        $skema->update([
            'kode_skema' => $request->kode_skema,
            'nama_skema' => $request->nama_skema,
        ]);

        return redirect()->route('user.skema')->with('success', 'Skema berhasil diperbarui!');
    }

    // Menghapus data skema
    public function destroy($id)
    {
        $skema = Skema::findOrFail($id);
        $skema->delete();

        return redirect()->route('user.skema')->with('success', 'Skema berhasil dihapus!');
    }
}