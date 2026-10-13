<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Method up() berfungsi untuk membuat atau mengubah struktur tabel di database saat perintah 'php artisan migrate' dijalankan.
     */
    public function up(): void
    {
        // 1. Membuat tabel 'users' untuk menyimpan data akun administrator
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Kolom ID utama (Primary Key, Auto Increment)
            $table->string('name'); // Kolom nama lengkap admin
            $table->string('email')->unique(); // Kolom email (bersifat unik/tidak boleh kembar)
            $table->timestamp('email_verified_at')->nullable(); // Waktu verifikasi email (opsional)
            $table->string('password'); // Kolom untuk menyimpan password yang sudah di-hash
            $table->rememberToken(); // Token untuk fitur "Remember Me" saat login
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
        });

        // 2. Membuat tabel 'password_reset_tokens' untuk fitur pemulihan kata sandi
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // 3. Membuat tabel 'sessions' untuk menyimpan data sesi login pengguna secara aktif
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * Method down() berfungsi untuk menghapus tabel kembali (rollback) jika terjadi kesalahan atau saat perintah 'php artisan migrate:rollback' dijalankan.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
