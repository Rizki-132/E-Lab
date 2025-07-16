@extends('layouts.adminlayout')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pengguna Lab Komputer</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Program Studi</th>
                        <th>Semester</th>
                        <th>Lab Komputer</th>
                        <th>Nomor Unit Komputer</th>
                        <th>Dosen</th>
                        <th>Matakuliah</th>
                        <th>Keadaan Unit</th>
                        <th>Saran</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
                <tbody>
                    @php
                    $no = 1;    
                    @endphp
                    @foreach($reports as $lab)
                    <tr>
                        <td>{{ $no++  }}</td>
                        <td>{{ $lab->nama }}</td>
                        <td>{{ $lab->nim }}</td>
                        <td>{{ $lab->prodi }}</td>
                        <td>{{ $lab->semester }}</td>
                        <td>{{ $lab->lab }}</td>
                        <td>{{ $lab->nomor_unit }}</td>
                        <td>{{ $lab->dosen }}</td>
                        <td>{{ $lab->matakuliah }}</td>
                        <td>{{ $lab->keadaan_unit}}</td>
                        <td>{{ $lab->saran }}</td>
                        <td>
                            <button type="button" class="btn btn-primary">cek Detail</button>
                            <button type="button" class="btn btn-danger">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                 </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
@endpush