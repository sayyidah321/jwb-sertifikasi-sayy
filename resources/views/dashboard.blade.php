@extends('layouts.app')

@section('content')
{{-- // Kotak Sambutan / Hero Section Dashboard --}}
<div class="p-4 mb-4 bg-light border rounded-1">
    <h3 class="fw-bold text-dark">Selamat Datang di Portal Pengelolaan Sertifikasi</h3>
    <p class="mb-0 text-secondary">Kelola data skema dan pendaftaran peserta sertifikasi profesi secara terstruktur.</p>
</div>

{{-- // Kotak Statistik Ringkasan (Total Skema & Total Peserta) --}}
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

{{-- // Tabel Daftar Peserta Terdaftar Terbaru --}}
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Peserta Terdaftar Terbaru</h5>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>No. Peserta / NIK</th>
                        <th>Nama Peserta</th>
                        <th>Skema</th>
                        <th>No. HP</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- // Melakukan perulangan data peserta terbaru --}}
                    @forelse($pesertaTerbaru ?? $pesertas as $p)
                    <tr>
                        <td>
                            <div class="fw-bold">{{ $p->no_peserta ?? $p->no_pendaftaran }}</div>
                            <small class="text-muted">{{ $p->nik ?? '-' }}</small>
                        </td>
                        <td>{{ $p->nama_peserta }}</td>
                        <td>
                            <span class="badge">{{ $p->skema->nama_skema ?? '-' }}</span>
                        </td>
                        <td>{{ $p->no_hp }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-3">Belum ada data peserta.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
