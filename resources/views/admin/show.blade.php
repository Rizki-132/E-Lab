@extends('layouts.adminlayout')

@section('content')
<div class="container mt-4">
    <h3>Detail Laporan Mahasiswa</h3>
    <table class="table table-bordered mt-3">
        <tr><th>Nama</th><td>{{ $report->nama }}</td></tr>
        <tr><th>NIM</th><td>{{ $report->nim }}</td></tr>
        <tr><th>Prodi</th><td>{{ $report->prodi }}</td></tr>
        <tr><th>Semester</th><td>{{ $report->semester }}</td></tr>
        <tr><th>Lab</th><td>{{ $report->lab }}</td></tr>
        <tr><th>Nomor Unit</th><td>{{ $report->nomor_unit }}</td></tr>
        <tr><th>Dosen</th><td>{{ $report->dosen }}</td></tr>
        <tr><th>Mata Kuliah</th><td>{{ $report->matakuliah }}</td></tr>
        <tr><th>Keadaan Unit</th><td>{{ $report->keadaan_unit }}</td></tr>
        <tr>
            <th>Foto Unit</th>
            <td>
                @if ($report->foto)
                    <img src="{{ asset($report->foto) }}" alt="Foto Unit" width="200">
                @else
                    Tidak ada foto
                @endif
            </td>
        </tr>
        <tr><th>Saran</th><td>{{ $report->saran }}</td></tr>
    </table>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-success">Kembali</a>
</div>
@endsection
