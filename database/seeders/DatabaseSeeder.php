<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Skema;
use App\Models\Peserta;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        User::create([
            'name' => 'Sayyidah Nafiysah ',
            'email' => 'Sayyidah@gmail.com',
            'password' => Hash::make('rahasia123'),
        ]);

        $s1 = Skema::create([
            'kode_skema' => 'SKM-JWD-01',
            'nama_skema' => 'Junior Web Developer',
            'jenis_skema' => 'Okupasi',
            'jumlah_unit' => 6
        ]);

        $s2 = Skema::create([
            'kode_skema' => 'SKM-JGD-02',
            'nama_skema' => 'Junior Graphic Designer',
            'jenis_skema' => 'Okupasi',
            'jumlah_unit' => 5
        ]);

        Peserta::create([
            'no_pendaftaran' => 'P-2026001',
            'nama_peserta' => 'Sayyidah Nafiysah',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jakarta Timur',
            'no_hp' => '088224718060',
            'skema_id' => $s1->id
        ]);
    }
}
