<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class PesertaController extends Controller {

    // 1. Menampilkan daftar seluruh peserta dengan fitur pencarian (search) dan paginasi
    public function index(Request $request) {
        $search = $request->input('search');
        $pesertas = Peserta::with('skema') // Mengambil data relasi dari tabel skema menggunakan Eloquent
            ->when($search, function ($query, $search) {
                // Melakukan filter pencarian berdasarkan nama peserta, nomor peserta, atau NIK
                return $query->where('nama_peserta', 'like', "%{$search}%")
                             ->orWhere('no_peserta', 'like', "%{$search}%")
                             ->orWhere('nik', 'like', "%{$search}%");
            })
            ->latest() // Mengurutkan data dari yang terbaru
            ->paginate(10); // Membatasi jumlah tampilan sebanyak 10 data per halaman

        return view('peserta.index', compact('pesertas', 'search'));
    }

    // 2. Menampilkan form untuk menambah data peserta baru beserta pilihan skema
    public function create() {
        $skemas = Skema::all(); // Mengambil seluruh data skema untuk pilihan dropdown
        return view('peserta.create', compact('skemas'));
    }

    // 3. Memproses penyimpanan data peserta baru ke database setelah divalidasi
    public function store(Request $request) {
        // Melakukan validasi input form (Server-side validation)
        $request->validate([
            'no_peserta' => 'required|unique:pesertas,no_peserta', // Nomor peserta wajib unik
            'nik' => 'required|numeric|digits:16', // NIK wajib diisi, berupa angka, dan harus pas 16 digit
            'nama_peserta' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/'], // Nama wajib dan tidak boleh mengandung angka
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric|max_digits:11', // No HP wajib diisi, angka, dan maksimal 11 digit
            'skema_id' => 'required|exists:skemas,id' // Memastikan ID skema benar-benar ada di tabel skemas
        ], [
            // Pesan error khusus agar mudah dipahami asesor
            'nama_peserta.regex' => 'Nama tidak boleh diisi dengan angka.',
            'nik.digits' => 'NIK harus persis berisi 16 digit angka.',
            'no_hp.max_digits' => 'Nomor telepon tidak boleh lebih dari 11 digit.'
        ]);

        Peserta::create($request->all()); // Menyimpan seluruh data request ke database
        return redirect()->route('peserta.index')->with('success', 'Peserta Berhasil Ditambahkan!');
    }

    // 4. Menampilkan detail lengkap dari data peserta tertentu
    public function show($id) {
        $peserta = Peserta::with('skema')->findOrFail($id);
        return view('peserta.show', compact('peserta'));
    }

    // 5. Menampilkan form untuk mengedit data peserta yang sudah ada
    public function edit(Peserta $peserta) {
        $skemas = Skema::all(); // Mengambil data skema untuk dropdown pada form edit
        return view('peserta.edit', compact('peserta', 'skemas'));
    }

    // 6. Memperbarui (update) data peserta di database setelah divalidasi ulang
    public function update(Request $request, Peserta $peserta) {
        $request->validate([
            'no_peserta' => 'required|unique:pesertas,no_peserta,' . $peserta->id,
            'nik' => 'required|numeric|digits:16', // NIK wajib diisi, berupa angka, dan harus pas 16 digit
            'nama_peserta' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/'], // Nama wajib dan tidak boleh mengandung angka
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric|max_digits:11', // No HP wajib diisi, angka, dan maksimal 11 digit
            'skema_id' => 'required|exists:skemas,id' // Memastikan ID skema benar-benar ada di tabel skemas
        ], [
            // Pesan error khusus agar mudah dipahami asesor
            'nama_peserta.regex' => 'Nama tidak boleh diisi dengan angka.',
            'nik.digits' => 'NIK harus persis berisi 16 digit angka.',
            'no_hp.max_digits' => 'Nomor telepon tidak boleh lebih dari 11 digit.'
        ]);

        $peserta->update($request->all());
        return redirect()->route('peserta.index')->with('success', 'Data Peserta Berhasil Diperbarui!');
    }
    // 7. Menghapus data peserta dari database
    public function destroy(Peserta $peserta) {
        $peserta->delete(); // Menghapus data peserta
        return redirect()->route('peserta.index')->with('success', 'Data Peserta Berhasil Dihapus!');
    }
}
