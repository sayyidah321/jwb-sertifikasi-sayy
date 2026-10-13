<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * Method up() berfungsi untuk membuat tabel 'pesertas' ke database beserta relasinya saat perintah migrasi dijalankan.
     */
    public function up(): void {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id(); // Kolom ID utama (Primary Key) peserta
            $table->string('no_pendaftaran')->unique(); // Nomor pendaftaran yang bersifat unik (tidak boleh ada yang kembar)
            $table->string('nama_peserta'); // Nama lengkap peserta
            $table->enum('jenis_kelamin', ['L', 'P']); // Pilihan jenis kelamin: L (Laki-laki) atau P (Perempuan)
            $table->text('alamat'); // Alamat lengkap peserta
            $table->string('no_hp'); // Nomor handphone peserta
            $table->foreignId('skema_id')->constrained('skemas')->onDelete('cascade'); // Foreign Key yang terhubung ke tabel 'skemas' (jika skema dihapus, data peserta ikut terhapus otomatis)
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     *
     * Method down() berfungsi untuk menghapus tabel 'pesertas' jika dilakukan rollback migrasi.
     */
    public function down(): void {
        Schema::dropIfExists('pesertas');
    }
};
