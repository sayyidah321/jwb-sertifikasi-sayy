<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Method up() berfungsi untuk membuat tabel penyimpanan cache saat perintah migrasi dijalankan.
     */
    public function up(): void
    {
        // 1. Membuat tabel 'cache' untuk menyimpan data sementara aplikasi agar performanya lebih cepat
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary(); // Kunci unik untuk identifikasi data cache
            $table->mediumText('value'); // Nilai atau isi data yang di-cache
            $table->integer('expiration')->index(); // Waktu kadaluarsa cache
        });

        // 2. Membuat tabel 'cache_locks' untuk manajemen penguncian proses (atomic locks) agar tidak terjadi bentrok data
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary(); // Kunci lock
            $table->string('owner'); // Pemilik proses yang melakukan lock
            $table->integer('expiration')->index(); // Waktu kadaluarsa lock
        });
    }

    /**
     * Reverse the migrations.
     *
     * Method down() berfungsi untuk menghapus kembali tabel cache jika dilakukan rollback migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
