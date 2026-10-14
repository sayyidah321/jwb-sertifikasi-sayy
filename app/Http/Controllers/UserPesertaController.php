<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Skema;

class UserPesertaController extends Controller
{
    public function index(Request $request)
    {
        $query = Peserta::with('skema');

        // Fitur Pencarian berdasarkan nama, email, atau no hp
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_peserta', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('no_hp', 'like', "%{$search}%");
            });
        }

        $pesertas = $query->get();
        $skemas = Skema::all();
        $editPeserta = null;

        return view('user.peserta_index', compact('pesertas', 'skemas', 'editPeserta'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_peserta' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:255',
            'skema_id' => 'required|exists:skemas,id',
        ]);

        $data = $request->all();
        $data['no_peserta'] = 'PST-' . time(); // Generate nomor peserta otomatis
        $data['nik'] = '317' . rand(100000000000, 999999999999); // Generate NIK dummy otomatis
        $data['alamat'] = 'Jakarta'; // Mengisi default alamat agar tidak error

        Peserta::create($data);

        return redirect()->route('user.peserta')->with('success', 'Peserta berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_peserta' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:255',
            'skema_id' => 'required|exists:skemas,id',
        ]);

        $peserta = Peserta::findOrFail($id);
        $peserta->update($request->all());

        return redirect()->route('user.peserta')->with('success', 'Data peserta berhasil diperbarui!');
    }
    public function show($id)
    {
        $peserta = Peserta::with('skema')->findOrFail($id);
        return view('user.peserta_show', compact('peserta'));
    }

    public function edit($id)
    {
        $pesertas = Peserta::with('skema')->get();
        $skemas = Skema::all();
        $editPeserta = Peserta::findOrFail($id);

        return view('user.peserta_index', compact('pesertas', 'skemas', 'editPeserta'));
    }

    

    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect()->route('user.peserta')->with('success', 'Peserta berhasil dihapus!');
    }
}