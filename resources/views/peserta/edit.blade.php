@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        {{-- // Kotak kartu untuk membungkus form edit data peserta --}}
        <div class="card border-0 shadow-sm rounded-4">
            {{-- // Bagian kepala kartu (header) dengan tema warna biru --}}
            <div class="card-header card-header-blue py-3 rounded-top-4">
                <h5 class="mb-0 fw-bold">Edit Data Peserta</h5>
            </div>
            <div class="card-body p-4">
                {{-- // Mengecek apakah terdapat error validasi dari server --}}
                @if($errors->any())
                    <div class="alert alert-danger p-2 small mb-3">
                        <ul class="mb-0 ps-3">
                            {{-- // Menampilkan setiap pesan error validasi --}}
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- // Form pengisian data peserta dengan metode PUT untuk update data --}}
                <form action="{{ route('peserta.update', $peserta) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        {{-- // Input untuk Nomor Peserta --}}
                        <label class="form-label text-secondary fw-semibold">No. Peserta</label>
                        <input type="text" name="no_peserta" class="form-control" value="{{ old('no_peserta', $peserta->no_peserta) }}" required>
                    </div>

                    <div class="mb-3">
                        {{-- // Input untuk NIK 16 digit --}}
                        <label class="form-label text-secondary fw-semibold">NIK</label>
                        <input type="text" name="nik" class="form-control" placeholder="16 digit NIK" value="{{ old('nik', $peserta->nik) }}" maxlength="16" required>
                    </div>

                    <div class="mb-3">
                        {{-- // Input untuk Nama Lengkap Peserta --}}
                        <label class="form-label text-secondary fw-semibold">Nama Peserta</label>
                        <input type="text" name="nama_peserta" class="form-control" value="{{ old('nama_peserta', $peserta->nama_peserta) }}" required>
                    </div>

                    <div class="mb-3">
                        {{-- // Pilihan jenis kelamin --}}
                        <label class="form-label text-secondary fw-semibold">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="L" {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        {{-- // Dropdown pilihan relasi skema sertifikasi --}}
                        <label class="form-label text-secondary fw-semibold">Skema Sertifikasi</label>
                        <select name="skema_id" class="form-select" required>
                            <option value="">-- Pilih Skema --</option>
                            @foreach($skemas as $skema)
                                <option value="{{ $skema->id }}" {{ old('skema_id', $peserta->skema_id) == $skema->id ? 'selected' : '' }}>
                                    {{ $skema->nama_skema }} ({{ $skema->kode_skema }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        {{-- // Input nomor HP / telepon --}}
                        <label class="form-label text-secondary fw-semibold">No. HP/Telepon</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $peserta->no_hp) }}" required>
                    </div>

                    <div class="mb-3">
                        {{-- // Textarea untuk alamat lengkap --}}
                        <label class="form-label text-secondary fw-semibold">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $peserta->alamat) }}</textarea>
                    </div>

                    <div class="d-flex gap-2">
                        {{-- // Tombol submit untuk memperbarui data dan tombol kembali --}}
                        <button type="submit" class="btn btn-pink w-100 py-2 rounded-3">Update Peserta</button>
                        <a href="{{ route('peserta.index') }}" class="btn btn-secondary w-100 py-2 rounded-3 text-center text-decoration-none">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
