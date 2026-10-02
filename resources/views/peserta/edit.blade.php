@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header card-header-blue py-3 rounded-top-4">
                <h5 class="mb-0 fw-bold">Edit Data Peserta</h5>
            </div>
            <div class="card-body p-4">
                @if($errors->any())
                    <div class="alert alert-danger p-2 small mb-3">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('peserta.update', $peserta) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label text-secondary fw-semibold">No. Pendaftaran</label>
                        <input type="text" name="no_pendaftaran" class="form-control" value="{{ old('no_pendaftaran', $peserta->no_pendaftaran) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary fw-semibold">Nama Peserta</label>
                        <input type="text" name="nama_peserta" class="form-control" value="{{ old('nama_peserta', $peserta->nama_peserta) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary fw-semibold">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="L" {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
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
                        <label class="form-label text-secondary fw-semibold">No. HP/Telepon</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $peserta->no_hp) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary fw-semibold">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $peserta->alamat) }}</textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-pink w-100 py-2 rounded-3">Update Peserta</button>
                        <a href="{{ route('peserta.index') }}" class="btn btn-secondary w-100 py-2 rounded-3">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
