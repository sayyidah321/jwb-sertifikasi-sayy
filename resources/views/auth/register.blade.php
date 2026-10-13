@extends('layouts.app') <!-- Menggunakan template layout utama dari folder layouts/app.blade.php -->

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-5 col-lg-4">
        <!-- Kotak kartu (card) untuk membungkus form registrasi agar rapi -->
        <div class="card border-0 shadow-sm rounded-4">

            <!-- Header Card dengan judul form registrasi -->
            <div class="card-header card-header-clean text-center py-3 bg-white rounded-top-4">
                <h5 class="mb-0 fw-bold">Registrasi Administrator</h5>
            </div>

            <div class="card-body p-4">
                <!-- Menampilkan pesan error validasi jika registrasi gagal (misal: email sudah terdaftar) -->
                @if($errors->any())
                    <div class="alert alert-danger p-2 small rounded-3 mb-3">
                        {{ $errors->first() }}
                    </div>
                @endif

                <!-- Form registrasi diarahkan ke route 'register.process' menggunakan metode POST -->
                <form action="{{ route('register.process') }}" method="POST">
                    @csrf <!-- Token keamanan wajib Laravel (CSRF Protection) untuk mencegah serangan lintas situs -->

                    <!-- Input untuk Nama Lengkap Admin -->
                    <div class="mb-3">
                        <label class="form-label text-secondary fw-semibold">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control py-2" placeholder="Nama Lengkap" value="{{ old('name') }}" required autofocus>
                    </div>

                    <!-- Input untuk Email Admin -->
                    <div class="mb-3">
                        <label class="form-label text-secondary fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control py-2" placeholder="admin@gmail.com" value="{{ old('email') }}" required>
                    </div>

                    <!-- Input untuk Password -->
                    <div class="mb-3">
                        <label class="form-label text-secondary fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control py-2" placeholder="••••••••" required>
                    </div>

                    <!-- Input untuk Konfirmasi Password (mencocokkan dengan password di atas) -->
                    <div class="mb-4">
                        <label class="form-label text-secondary fw-semibold">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control py-2" placeholder="••••••••" required>
                    </div>

                    <!-- Tombol submit untuk mengirim data pendaftaran akun baru -->
                    <button type="submit" class="btn btn-primary-custom w-100 py-2 rounded-3 fw-semibold mb-3">DAFTAR AKUN</button>

                    <!-- Link alternatif jika sudah punya akun, diarahkan kembali ke halaman login -->
                    <div class="text-center small">
                        Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">Login di sini</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
