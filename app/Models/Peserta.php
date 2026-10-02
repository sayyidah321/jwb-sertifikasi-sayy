<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $fillable = ['no_pendaftaran', 'nama_peserta', 'jenis_kelamin', 'alamat', 'no_hp', 'skema_id'];

    public function skema(){
        return $this->belongsTo(Skema::class);
    }
}
