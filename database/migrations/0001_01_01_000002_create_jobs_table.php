<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Method up() berfungsi untuk membuat tabel-tabel antrean tugas (queue) saat perintah migrasi dijalankan.
     */
    public function up(): void
    {
        // 1. Membuat tabel 'jobs' untuk menyimpan antrean tugas latar belakang (background jobs)
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue')->index(); // Nama antrean (queue)
            $table->longText('payload'); // Data atau aksi tugas yang harus dikerjakan
            $table->unsignedTinyInteger('attempts'); // Jumlah percobaan eksekusi tugas
            $table->unsignedInteger('reserved_at')->nullable(); // Waktu tugas sedang diproses
            $table->unsignedInteger('available_at'); // Waktu tugas siap dieksekusi
            $table->unsignedInteger('created_at'); // Waktu tugas dibuat
        });

        // 2. Membuat tabel 'job_batches' untuk melacak kelompok tugas (batch processing) secara bersamaan
        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name'); // Nama batch
            $table->integer('total_jobs'); // Total seluruh tugas dalam batch
            $table->integer('pending_jobs'); // Jumlah tugas yang belum selesai
            $table->integer('failed_jobs'); // Jumlah tugas yang gagal
            $table->longText('failed_job_ids'); // ID tugas yang gagal
            $table->mediumText('options')->nullable(); // Pengaturan tambahan
            $table->integer('cancelled_at')->nullable(); // Waktu batch dibatalkan
            $table->integer('created_at');
            $table->integer('finished_at')->nullable(); // Waktu batch selesai
        });

        // 3. Membuat tabel 'failed_jobs' untuk mencatat daftar tugas latar belakang yang gagal dieksekusi
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique(); // UUID unik untuk tugas gagal
            $table->text('connection'); // Koneksi queue yang digunakan
            $table->text('queue'); // Nama antrean
            $table->longText('payload'); // Data tugas yang gagal
            $table->longText('exception'); // Pesan error (exception) penyebab kegagalan
            $table->timestamp('failed_at')->useCurrent(); // Waktu kapan tugas tersebut gagal
        });
    }

    /**
     * Reverse the migrations.
     *
     * Method down() berfungsi untuk menghapus tabel-tabel queue jika dilakukan rollback migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};
