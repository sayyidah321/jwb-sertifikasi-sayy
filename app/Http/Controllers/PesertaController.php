<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class PesertaController extends Controller {
    public function index(Request $request) {
        $search = $request->input('search');
        $pesertas = Peserta::with('skema')
            ->when($search, function ($query, $search) {
                return $query->where('nama_peserta', 'like', "%{$search}%")
                             ->orWhere('no_pendaftaran', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('peserta.index', compact('pesertas', 'search'));
    }

    public function create() {
        $skemas = Skema::all();
        return view('peserta.create', compact('skemas'));
    }

    public function store(Request $request) {
        $request->validate([
            'no_pendaftaran' => 'required|unique:pesertas,no_pendaftaran',
            'nama_peserta' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
            'skema_id' => 'required|exists:skemas,id'
        ]);

        Peserta::create($request->all());
        return redirect()->route('peserta.index')->with('success', 'Peserta Berhasil Ditambahkan!');
    }

    public function show($id) {
        $peserta = Peserta::with('skema')->findOrFail($id);
        return view('peserta.show', compact('peserta'));
    }

    public function edit(Peserta $peserta) {
        $skemas = Skema::all();
        return view('peserta.edit', compact('peserta', 'skemas'));
    }

    public function update(Request $request, Peserta $peserta) {
        $request->validate([
            'no_pendaftaran' => 'required|unique:pesertas,no_pendaftaran,' . $peserta->id,
            'nama_peserta' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
            'skema_id' => 'required|exists:skemas,id'
        ]);

        $peserta->update($request->all());
        return redirect()->route('peserta.index')->with('success', 'Data Peserta Berhasil Diperbarui!');
    }

    public function destroy(Peserta $peserta) {
        $peserta->delete();
        return redirect()->route('peserta.index')->with('success', 'Data Peserta Berhasil Dihapus!');
    }
}
