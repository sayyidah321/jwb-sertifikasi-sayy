<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Skema;
use App\Models\Peserta;
use Illuminate\Support\Facades\Hash; // Mengimpor fungsi Hash untuk enkripsi password

class DatabaseSeeder extends Seeder {

    // Method run() dijalankan saat perintah 'php artisan db:seed' atau 'php artisan migrate:fresh --seed' dipanggil
    public function run(): void {

        // 1. Membuat data akun Administrator default
        User::create([
            'name' => 'Sayyidah Nafiysah ',
            'email' => 'Sayyidah@gmail.com',
            'password' => Hash::make('rahasia123'), // Mengenkripsi password secara otomatis sebelum disimpan
        ]);

        // 2. Membuat data contoh Skema Sertifikasi pertama
        $s1 = Skema::create([
            'kode_skema' => 'SKM-JWD-01',
            'nama_skema' => 'Junior Web Developer',
            'jenis_skema' => 'Okupasi',
            'jumlah_unit' => 6
        ]);

        // 3. Membuat data contoh Skema Sertifikasi kedua
        $s2 = Skema::create([
            'kode_skema' => 'SKM-JGD-02',
            'nama_skema' => 'Junior Graphic Designer',
            'jenis_skema' => 'Okupasi',
            'jumlah_unit' => 5
        ]);

        // 4. Membuat data contoh Peserta pendaftar yang terhubung dengan skema pertama ($s1)
        Peserta::create([
            'no_pendaftaran' => 'P-2026001',
            'nama_peserta' => 'Sayyidah Nafiysah',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jakarta Timur',
            'no_hp' => '088224718060',
            'skema_id' => $s1->id // Mengambil ID dari skema Junior Web Developer secara otomatis
        ]);
    }
}
