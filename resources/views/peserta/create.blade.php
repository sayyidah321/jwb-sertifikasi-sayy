@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header card-header-pink py-3 rounded-top-4">
                <h5 class="mb-0">Tambah Data Peserta</h5>
            </div>
            <div class="card-body p-4">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('peserta.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">No. Pendaftaran</label>
                        <input type="text" name="no_pendaftaran" class="form-control" placeholder="Contoh: P-2026002" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap Peserta</label>
                        <input type="text" name="nama_peserta" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Skema Sertifikasi (Relasi Database)</label>
                        <select name="skema_id" class="form-select" required>
                            <option value="" disabled selected>Pilih Skema</option>
                            @foreach($skemas as $s)
                                <option value="{{ $s->id }}">{{ $s->kode_skema }} - {{ $s->nama_skema }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">No. HP / WA</label>
                        <input type="text" name="no_hp" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Alamat Lengkap</label>
                        <textarea name="alamat" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-blue">Simpan Data Peserta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
