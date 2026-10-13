<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * Method up() berfungsi untuk membuat tabel 'skemas' ke database saat perintah migrasi dijalankan.
     */
    public function up(): void {
        Schema::create('skemas', function (Blueprint $table) {
            $table->id(); // Kolom ID utama (Primary Key)
            $table->string('kode_skema')->unique(); // Kode skema sertifikasi yang bersifat unik (tidak boleh kembar)
            $table->string('nama_skema'); // Nama skema sertifikasi
            $table->string('jenis_skema'); // Jenis skema (misal: Klaster, Okupasi, dll)
            $table->integer('jumlah_unit'); // Jumlah unit kompetensi dalam skema
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     *
     * Method down() berfungsi untuk menghapus tabel 'skemas' jika dilakukan rollback migrasi.
     */
    public function down(): void {
        Schema::dropIfExists('skemas');
    }
};
