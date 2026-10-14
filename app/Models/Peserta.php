<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    // Menentukan kolom mana saja yang boleh diisi secara massal (Mass Assignment Protection)
    protected $fillable = ['no_peserta', 'nik', 'nama_peserta', 'email', 'jenis_kelamin', 'alamat', 'no_hp', 'skema_id'];
    // Mendefinisikan relasi Eloquent: 1 Peserta dimiliki oleh 1 Skema (Many to One)
    public function skema(){
        return $this->belongsTo(Skema::class);
    }
}
