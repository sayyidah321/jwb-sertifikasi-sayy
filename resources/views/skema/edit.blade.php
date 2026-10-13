@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        {{-- // Kotak kartu untuk membungkus form edit data skema sertifikasi --}}
        <div class="card border-0 shadow-sm rounded-4">
            {{-- // Bagian kepala kartu (header) dengan tema warna biru --}}
            <div class="card-header card-header-blue py-3 rounded-top-4">
                <h5 class="mb-0 fw-bold">Edit Skema Sertifikasi</h5>
            </div>
            <div class="card-body p-4">
                {{-- // Menampilkan alert pesan error jika ada validasi yang gagal --}}
                @if($errors->any())
                    <div class="alert alert-danger p-2 small">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- // Form pembaruan data skema dengan metode PUT --}}
                <form action="{{ route('skema.update', $skema->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        {{-- // Input untuk Kode Skema --}}
                        <label class="form-label text-secondary fw-semibold">Kode Skema</label>
                        <input type="text" name="kode_skema" class="form-control" value="{{ old('kode_skema', $skema->kode_skema) }}" required>
                    </div>

                    <div class="mb-3">
                        {{-- // Input untuk Nama Skema --}}
                        <label class="form-label text-secondary fw-semibold">Nama Skema</label>
                        <input type="text" name="nama_skema" class="form-control" value="{{ old('nama_skema', $skema->nama_skema) }}" required>
                    </div>

                    <div class="mb-3">
                        {{-- // Input untuk Jenis Skema --}}
                        <label class="form-label text-secondary fw-semibold">Jenis Skema</label>
                        <input type="text" name="jenis_skema" class="form-control" value="{{ old('jenis_skema', $skema->jenis_skema) }}" required>
                    </div>

                    <div class="mb-3">
                        {{-- // Input untuk Jumlah Unit Kompetensi --}}
                        <label class="form-label text-secondary fw-semibold">Jumlah Unit</label>
                        <input type="number" name="jumlah_unit" class="form-control" value="{{ old('jumlah_unit', $skema->jumlah_unit) }}" required>
                    </div>

                    <div class="d-flex gap-2">
                        {{-- // Tombol submit update dan tombol batal kembali --}}
                        <button type="submit" class="btn btn-pink w-100 py-2 rounded-3">Update Skema</button>
                        <a href="{{ route('skema.index') }}" class="btn btn-secondary w-100 py-2 rounded-3 text-center text-decoration-none">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
