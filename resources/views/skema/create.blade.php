@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header card-header-pink py-3 rounded-top-4">
                <h5 class="mb-0">Tambah Skema Sertifikasi</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('skema.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kode Skema</label>
                        <input type="text" name="kode_skema" class="form-control" placeholder="SKM-JWD-01" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Skema</label>
                        <input type="text" name="nama_skema" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Skema</label>
                        <input type="text" name="jenis_skema" class="form-control" placeholder="Okupasi / KKNI" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah Unit Kompetensi</label>
                        <input type="number" name="jumlah_unit" class="form-control" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('skema.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-blue">Simpan Skema</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
