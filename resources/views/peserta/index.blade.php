@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold">Data Peserta Sertifikasi Sayyidah</h4>
    <a href="{{ route('peserta.create') }}" class="btn btn-pink rounded-3">+ Tambah Peserta</a>
</div>

<div class="card border-0 shadow-sm rounded-4 mb-3">
    <div class="card-body">
        <form action="{{ route('peserta.index') }}" method="GET" class="row g-2">
            <div class="col-md-10">
                <input type="text" name="search" class="form-control" placeholder="Cari Berdasarkan Nama / No. Pendaftaran" value="{{ $search }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-blue w-100">Cari</button>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead class="card-header-blue">
                    <tr>
                        <th>No</th>
                        <th>No. Pendaftaran</th>
                        <th>Nama Peserta</th>
                        <th>L/P</th>
                        <th>Skema Sertifikasi</th>
                        <th>No HP</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesertas as $index => $p)
                    <tr>
                        <td>{{ $pesertas->firstItem() + $index }}</td>
                        <td>{{ $p->no_pendaftaran }}</td>
                        <td>{{ $p->nama_peserta }}</td>
                        <td>{{ $p->jenis_kelamin }}</td>
                        <td><span class="badge btn-blue">{{ $p->skema->nama_skema }}</span></td>
                        <td>{{ $p->no_hp }}</td>
                        <td class="text-center">
                            <a href="{{ route('peserta.show', $p->id) }}" class="btn btn-info btn-sm text-white">Detail</a>
                            <a href="{{ route('peserta.edit', $p->id) }}" class="btn btn-warning btn-sm text-dark">Edit</a>
                            <form action="{{ route('peserta.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-3">Tidak ada data ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3">
    {{ $pesertas->links() }}
</div>
@endsection
