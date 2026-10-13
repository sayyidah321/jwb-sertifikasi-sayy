@extends('layouts.app') <!-- Menggunakan template layout utama dari folder layouts/app.blade.php -->

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-5 col-lg-4">
        <!-- Kotak kartu (card) untuk membungkus form login agar terlihat rapi dan modern -->
        <div class="card border-0 shadow-sm rounded-4">

            <!-- Header Card dengan judul form login -->
            <div class="card-header card-header-clean text-center py-3 bg-white rounded-top-4">
                <h5 class="mb-0 fw-bold">Login Administrator</h5>
            </div>

            <div class="card-body p-4">
                <!-- Menampilkan pesan error jika login gagal atau ada validasi yang salah -->
                @if($errors->any())
                    <div class="alert alert-danger p-2 small rounded-3 mb-3">{{ $errors->first() }}</div>
                @endif

                <!-- Form login diarahkan ke route 'login.process' menggunakan metode POST -->
                <form action="{{ route('login.process') }}" method="POST">
                    @csrf <!-- Token keamanan wajib Laravel (CSRF Protection) untuk mencegah serangan lintas situs -->

                    <!-- Input untuk Email Administrator -->
                    <div class="mb-3">
                        <label class="form-label text-secondary fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control py-2" placeholder="admin@gmail.com" value="{{ old('email') }}" required autofocus>
                    </div>

                    <!-- Input untuk Password -->
                    <div class="mb-4">
                        <label class="form-label text-secondary fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control py-2" placeholder="••••••••" required>
                    </div>

                    <!-- Tombol submit untuk mengirim data login -->
                    <button type="submit" class="btn btn-primary-custom w-100 py-2 rounded-3 fw-semibold">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
