@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        {{-- // Kotak kartu untuk membungkus form tambah data skema sertifikasi --}}
        <div class="card border-0 shadow-sm rounded-4">
            {{-- // Bagian kepala kartu (header) dengan tema warna pink --}}
            <div class="card-header card-header-pink py-3 rounded-top-4">
                <h5 class="mb-0">Tambah Skema Sertifikasi</h5>
            </div>
            <div class="card-body p-4">
                {{-- // Form penyimpanan data skema baru dengan metode POST --}}
                <form action="{{ route('skema.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        {{-- // Input untuk Kode Skema --}}
                        <label class="form-label fw-semibold">Kode Skema</label>
                        <input type="text" name="kode_skema" class="form-control" value="{{ old('kode_skema') }}" placeholder="SKM-JWD-01" required>
                    </div>

                    <div class="mb-3">
                        {{-- // Input untuk Nama Skema --}}
                        <label class="form-label fw-semibold">Nama Skema</label>
                        <input type="text" name="nama_skema" class="form-control" value="{{ old('nama_skema') }}" required>
                    </div>

                    <div class="mb-3">
                        {{-- // Input untuk Jenis Skema --}}
                        <label class="form-label fw-semibold">Jenis Skema</label>
                        <input type="text" name="jenis_skema" class="form-control" value="{{ old('jenis_skema') }}" placeholder="Okupasi / KKNI" required>
                    </div>

                    <div class="mb-3">
                        {{-- // Input untuk Jumlah Unit Kompetensi --}}
                        <label class="form-label fw-semibold">Jumlah Unit Kompetensi</label>
                        <input type="number" name="jumlah_unit" class="form-control" value="{{ old('jumlah_unit') }}" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        {{-- // Tombol kembali dan tombol submit simpan data skema --}}
                        <a href="{{ route('skema.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-blue">Simpan Skema</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
