@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark">Data Skema Sertifikasi</h3>
        <a href="{{ route('user.dashboard') }}" class="btn btn-secondary btn-sm rounded-pill px-3">Kembali ke Dashboard</a>
    </div>

    {{-- Form Dinamis: Tambah atau Update --}}
    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
        <h5 class="fw-bold mb-3">{{ isset($editSkema) ? 'Edit Skema Sertifikasi' : 'Tambah Skema Baru' }}</h5>
        
        <form action="{{ isset($editSkema) ? route('user.skema.update', $editSkema->id) : route('user.skema.store') }}" method="POST">
            @csrf
            @if(isset($editSkema))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label fw-semibold">Kode Skema</label>
                <input type="text" name="kode_skema" class="form-control" value="{{ $editSkema->kode_skema ?? old('kode_skema') }}" placeholder="SKM-JWD-01" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Skema</label>
                <input type="text" name="nama_skema" class="form-control" value="{{ $editSkema->nama_skema ?? old('nama_skema') }}" placeholder="Nama Skema" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4 fw-semibold">
                    {{ isset($editSkema) ? 'Update Data' : 'Tambah Skema' }}
                </button>

                @if(isset($editSkema))
                    <a href="{{ route('user.skema') }}" class="btn btn-secondary px-4 fw-semibold">Batal Edit</a>
                @endif
            </div>
        </form>
    </div>

    {{-- Tabel Data Skema --}}
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th class="py-3 ps-3">No</th>
                        <th class="py-3">Kode Skema</th>
                        <th class="py-3">Nama Skema</th>
                        <th class="py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skemas as $index => $skema)
                    <tr>
                        <td class="ps-3">{{ $index + 1 }}</td>
                        <td class="fw-bold">{{ $skema->kode_skema }}</td>
                        <td>{{ $skema->nama_skema }}</td>
                        <td class="text-center">
                            {{-- Tombol Edit mengarah ke route edit dengan ID --}}
                            <a href="{{ route('user.skema.edit', $skema->id) }}" class="btn btn-warning btn-sm text-white fw-semibold px-3">Edit</a>
                            
                            <form action="{{ route('user.skema.destroy', $skema->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm fw-semibold px-3" onclick="return confirm('Yakin ingin menghapus skema ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-3">Belum ada data skema.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection