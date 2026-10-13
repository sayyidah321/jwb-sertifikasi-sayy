@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        {{-- // Bagian Header: Judul Detail Skema dan Tombol Kembali --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold">Detail Skema Sertifikasi</h4>
            <a href="{{ route('skema.index') }}" class="btn btn-secondary btn-sm rounded-3">Kembali</a>
        </div>

        {{-- // Kotak kartu untuk menampilkan informasi detail skema --}}
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                {{-- // Tabel daftar atribut skema sertifikasi --}}
                <table class="table table-borderless mb-0">
                    <tr>
                        <th width="30%" class="text-secondary">Kode Skema</th>
                        <td>: {{ $skema->kode_skema }}</td>
                    </tr>
                    <tr>
                        <th class="text-secondary">Nama Skema</th>
                        <td>: {{ $skema->nama_skema }}</td>
                    </tr>
                    <tr>
                        <th class="text-secondary">Jenis Skema</th>
                        <td>: {{ $skema->jenis_skema }}</td>
                    </tr>
                    <tr>
                        <th class="text-secondary">Jumlah Unit</th>
                        <td>: {{ $skema->jumlah_unit }} Unit</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
