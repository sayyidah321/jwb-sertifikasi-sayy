@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header card-header-blue py-3 rounded-top-4">
                <h5 class="mb-0">Detail Informasi Peserta</h5>
            </div>
            <div class="card-body p-4">
                <table class="table table-borderless">
                    <tr>
                        <th width="40%">No. Pendaftaran</th>
                        <td>: {{ $peserta->no_pendaftaran }}</td>
                    </tr>
                    <tr>
                        <th>Nama Peserta</th>
                        <td>: {{ $peserta->nama_peserta }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>: {{ $peserta->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    </tr>
                    <tr>
                        <th>Skema Diikuti</th>
                        <td>: <span class="badge btn-pink">{{ $peserta->skema?->nama_skema ?? 'Skema Belum Dipilih' }}</span></td>
                    </tr>
                    <tr>
                        <th>Kode Skema</th>
                        <td>: {{ $peserta->skema?->kode_skema ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>No. Telepon/HP</th>
                        <td>: {{ $peserta->no_hp }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>: {{ $peserta->alamat }}</td>
                    </tr>
                </table>
                <a href="{{ route('peserta.index') }}" class="btn btn-secondary w-100">Kembali ke Daftar Peserta</a>
            </div>
        </div>
    </div>
</div>
@endsection
