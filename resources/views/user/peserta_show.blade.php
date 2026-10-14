@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h4 class="fw-bold mb-4">Detail Peserta</h4>
                
                <div class="mb-3">
                    <span class="text-muted d-block small">Nama Peserta</span>
                    <strong class="fs-6 text-dark">{{ $peserta->nama_peserta }}</strong>
                </div>
                <div class="mb-3">
                    <span class="text-muted d-block small">Email</span>
                    <strong class="fs-6 text-dark">{{ $peserta->email }}</strong>
                </div>
                <div class="mb-3">
                    <span class="text-muted d-block small">No HP / Telepon</span>
                    <strong class="fs-6 text-dark">{{ $peserta->no_hp }}</strong>
                </div>
                <div class="mb-4">
                    <span class="text-muted d-block small">Skema</span>
                    <strong class="fs-6 text-dark">{{ $peserta->skema->nama_skema ?? '-' }}</strong>
                </div>

                <a href="{{ route('user.peserta') }}" class="btn btn-secondary w-100 fw-semibold">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection