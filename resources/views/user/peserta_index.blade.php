@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark">Data Peserta</h3>
        <a href="{{ route('user.dashboard') }}" class="btn btn-secondary btn-sm rounded-pill px-3">Kembali ke Dashboard</a>
    </div>

    {{-- Form Tambah / Edit Peserta (Dinamis) --}}
    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
        <h5 class="fw-bold mb-3">{{ isset($editPeserta) ? 'Edit Peserta' : 'Tambah Peserta Baru' }}</h5>
        
        <form action="{{ isset($editPeserta) ? route('user.peserta.update', $editPeserta->id) : route('user.peserta.store') }}" method="POST">
            @csrf
            @if(isset($editPeserta))
                @method('PUT')
            @endif

            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Nama Peserta</label>
                    <input type="text" name="nama_peserta" class="form-control" value="{{ $editPeserta->nama_peserta ?? old('nama_peserta') }}" placeholder="Nama Lengkap" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $editPeserta->email ?? old('email') }}" placeholder="email@gmail.com" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ $editPeserta->no_hp ?? old('no_hp') }}" placeholder="087890208776" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Pilih Skema</label>
                    <select name="skema_id" class="form-select" required>
                        <option value="">-- Pilih Skema --</option>
                        @foreach($skemas ?? [] as $skema)
                            <option value="{{ $skema->id }}" {{ (isset($editPeserta) && $editPeserta->skema_id == $skema->id) ? 'selected' : '' }}>
                                {{ $skema->nama_skema }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4 fw-semibold">
                    {{ isset($editPeserta) ? 'Simpan' : 'Tambah' }}
                </button>
                @if(isset($editPeserta))
                    <a href="{{ route('user.peserta') }}" class="btn btn-secondary px-4 fw-semibold">Batal</a>
                @endif
            </div>
        </form>
    </div>

    {{-- Form Pencarian Data Peserta --}}
    <div class="card border-0 shadow-sm rounded-4 p-3 mb-4">
        <form action="{{ route('user.peserta') }}" method="GET" class="row g-2">
            <div class="col-md-10">
                <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Cari berdasarkan nama peserta, email, atau no hp...">
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-primary w-100 fw-semibold">Cari</button>
                @if(request('search'))
                    <a href="{{ route('user.peserta') }}" class="btn btn-secondary w-100 fw-semibold">Reset</a>
                @endif
            </div>
        </form>
    </div>

    {{-- Tabel Data Peserta --}}
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th class="py-3 ps-3">No</th>
                        <th class="py-3">Nama Peserta</th>
                        <th class="py-3">Email</th>
                        <th class="py-3">No HP</th>
                        <th class="py-3">Skema</th>
                        <th class="py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesertas as $index => $peserta)
                    <tr>
                        <td class="ps-3">{{ $index + 1 }}</td>
                        <td class="fw-bold">{{ $peserta->nama_peserta }}</td>
                        <td>{{ $peserta->email }}</td>
                        <td>{{ $peserta->no_hp }}</td>
                        <td>{{ $peserta->skema->nama_skema ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('user.peserta.show', $peserta->id) }}" class="btn btn-info btn-sm text-white fw-semibold px-2">Detail</a>
                            <a href="{{ route('user.peserta.edit', $peserta->id) }}" class="btn btn-warning btn-sm text-white fw-semibold px-2">Edit</a>
                            
                            <form action="{{ route('user.peserta.destroy', $peserta->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm fw-semibold px-2" onclick="return confirm('Yakin ingin menghapus peserta ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-3">Belum ada data peserta.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection