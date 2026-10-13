<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{
    use HasFactory;

    // Menentukan kolom tabel mana saja yang diizinkan untuk diisi secara massal (Mass Assignment)
    protected $fillable = ['kode_skema', 'nama_skema', 'jenis_skema', 'jumlah_unit'];

    // Mendefinisikan relasi Eloquent: 1 Skema dapat dimiliki oleh banyak Peserta (One to Many)
    public function pesertas(){
        return $this->hasMany(Peserta::class);
    }
}
