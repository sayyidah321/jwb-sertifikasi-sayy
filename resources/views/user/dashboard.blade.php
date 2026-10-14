@extends('layouts.app')

@section('content')
<div class="container py-4">
    {{-- Bagian Sambutan --}}
    <div class="mb-4">
        <h3 class="fw-bold text-dark">Halo, {{ Auth::user()->name ?? 'Peserta' }}! 👋</h3>
    </div>

    {{-- Baris untuk membagi 2 kolom secara berdampingan --}}
    <div class="row g-4">
        {{-- Kolom Kiri: Status Pendaftaran Saya --}}
        <div class="col-lg-6">
    <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
        <h5 class="fw-bold mb-3">📄 Status Pendaftaran Saya</h5>
        
        @if(isset($pesertaData) && $pesertaData)
            <p><strong>Nama:</strong> {{ $pesertaData->nama }}</p>
            <p><strong>Email:</strong> {{ $pesertaData->email }}</p>
            <p><strong>Status:</strong> <span class="badge bg-primary">{{ $pesertaData->status }}</span></p>
        @else
            <div class="alert alert-warning mb-0">
                Data pendaftaran peserta Anda belum terhubung dengan akun ini.
            </div>
        @endif
    </div>
</div>

        {{-- Kolom Kanan: Skema Sertifikasi Tersedia --}}
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                <h5 class="fw-bold mb-3">🧩 Skema Sertifikasi Tersedia</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Kode</th>
                                <th>Nama Skema</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($skemas as $skema)
                            <tr>
                                <td class="fw-semibold">{{ $skema->kode_skema }}</td>
                                <td>{{ $skema->nama_skema }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="text-center text-muted">Belum ada skema tersedia.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection