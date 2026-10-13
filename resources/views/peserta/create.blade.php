@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        {{-- // Kotak kartu untuk membungkus form tambah data peserta --}}
        <div class="card border-0 shadow-sm rounded-4">
            {{-- // Bagian kepala kartu (header) dengan tema warna pink --}}
            <div class="card-header card-header-pink py-3 rounded-top-4">
                <h5 class="mb-0">Tambah Data Peserta</h5>
            </div>
            <div class="card-body p-4">
                {{-- // Menampilkan pesan error validasi server jika ada input yang tidak sesuai --}}
                @if($errors->any())
                    <div class="alert alert-danger p-3 mb-3 rounded-3">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- // Form penyimpanan data peserta baru dengan metode POST --}}
                <form action="{{ route('peserta.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        {{-- // Input untuk Nomor Peserta --}}
                        <label class="form-label fw-semibold">No. Peserta</label>
                        <input type="text" name="no_peserta" class="form-control" value="{{ old('no_peserta') }}" placeholder="Contoh: P-001" required>
                    </div>

                    <div class="mb-3">
                        {{-- // Input untuk NIK (Harus pas 16 digit angka) --}}
                        <label class="form-label fw-semibold">NIK</label>
                        <input type="text" name="nik" class="form-control" value="{{ old('nik') }}" placeholder="Masukkan 16 digit NIK" maxlength="16" required>
                    </div>

                    <div class="mb-3">
                        {{-- // Input untuk Nama Lengkap (Hanya huruf dan spasi) --}}
                        <label class="form-label fw-semibold">Nama Lengkap Peserta</label>
                        <input type="text" name="nama_peserta" class="form-control" value="{{ old('nama_peserta') }}" required>
                    </div>

                    <div class="mb-3">
                        {{-- // Pilihan Jenis Kelamin --}}
                        <label class="form-label fw-semibold">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        {{-- // Dropdown Skema Sertifikasi --}}
                        <label class="form-label fw-semibold">Skema Sertifikasi</label>
                        <select name="skema_id" class="form-select" required>
                            <option value="" disabled selected>Pilih Skema</option>
                            @foreach($skemas as $s)
                                <option value="{{ $s->id }}" {{ old('skema_id') == $s->id ? 'selected' : '' }}>
                                    {{ $s->kode_skema }} - {{ $s->nama_skema }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        {{-- // Input No HP (Maksimal 11 digit angka) --}}
                        <label class="form-label fw-semibold">No. HP / WA</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}" placeholder="Maksimal 11 digit angka" required>
                    </div>

                    <div class="mb-3">
                        {{-- // Textarea Alamat Lengkap --}}
                        <label class="form-label fw-semibold">Alamat Lengkap</label>
                        <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        {{-- // Tombol kembali dan tombol submit simpan data --}}
                        <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-blue">Simpan Data Peserta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
