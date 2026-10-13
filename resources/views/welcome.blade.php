@extends('layouts.app')

@section('content')
{{-- // Kotak pembungkus utama untuk menyelaraskan konten selamat datang di tengah layar --}}
<div class="row justify-content-center align-items-center" style="min-height: 65vh;">
    <div class="col-md-6">
        {{-- // Kotak kartu (card) untuk menampilkan informasi sambutan dan tombol navigasi --}}
        <div class="card border-0 shadow-sm rounded-4 text-center p-4">
            <div class="card-body">
                {{-- // Judul utama portal sertifikasi --}}
                <h3 class="fw-bold mb-3">Selamat Datang di Portal Sertifikasi JWD Sayyidah</h3>
                {{-- // Deskripsi singkat mengenai sistem pengelolaan data --}}
                <p class="text-secondary mb-4 small">
                    Sistem Pengelolaan Data Skema Sertifikasi dan Peserta Profesi secara Terstruktur dan Terintegrasi.
                </p>
                {{-- // Tombol aksi cepat untuk Login Admin dan Registrasi Akun --}}
                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ route('login') }}" class="btn btn-primary px-4 py-2">Login Admin</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary px-4 py-2">Registrasi</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
