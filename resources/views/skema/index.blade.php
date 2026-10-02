@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold">Data Skema Sertifikasi</h4>
    <a href="{{ route('skema.create') }}" class="btn btn-pink rounded-3">+ Tambah Skema</a>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead class="card-header-blue">
                <tr>
                    <th>No</th>
                    <th>Kode Skema</th>
                    <th>Nama Skema</th>
                    <th>Jenis Skema</th>
                    <th>Jumlah Unit</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($skemas as $index => $s)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $s->kode_skema }}</td>
                    <td>{{ $s->nama_skema }}</td>
                    <td>{{ $s->jenis_skema }}</td>
                    <td>{{ $s->jumlah_unit }} Unit</td>
                    <td class="text-center">
                        <a href="{{ route('skema.edit', $s->id) }}" class="btn btn-warning btn-sm text-dark">Edit</a>
                        <form action="{{ route('skema.destroy', $s->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Menghapus skema akan menghapus peserta terkait!')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-3">Belum ada skema sertifikasi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
