@extends('layouts.app')

@section('content')
<div class="p-4 mb-4 bg-light border rounded-1">
    <h3 class="fw-bold text-dark">Selamat Datang di Portal Pengelolaan Sertifikasi</h3>
    <p class="mb-0 text-secondary">Kelola data skema dan pendaftaran peserta sertifikasi profesi secara terstruktur.</p>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-6">
        <div class="card border rounded-1 p-3">
            <span class="text-secondary fw-semibold small">Total Skema Sertifikasi</span>
            <h2 class="display-6 fw-bold mb-0 text-dark">{{ $totalSkema }}</h2>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border rounded-1 p-3">
            <span class="text-secondary fw-semibold small">Total Peserta Terdaftar</span>
            <h2 class="display-6 fw-bold mb-0 text-dark">{{ $totalPeserta }}</h2>
        </div>
    </div>
</div>

<div class="card border rounded-1">
    <div class="card-header bg-light border-bottom py-3">
        <h6 class="mb-0 fw-bold text-dark">Peserta Terdaftar Terbaru</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No. Pendaftaran</th>
                        <th>Nama Peserta</th>
                        <th>Skema</th>
                        <th>No. HP</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesertaTerbaru as $p)
                    <tr>
                        <td>{{ $p->no_pendaftaran }}</td>
                        <td>{{ $p->nama_peserta }}</td>
                        <td>
                            <span class="badge bg-secondary font-monospace">{{ $p->skema->nama_skema ?? '-' }}</span>
                        </td>
                        <td>{{ $p->no_hp }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-3 text-muted">Belum ada data peserta.</td>
                    </tr>
                    @endempty
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
