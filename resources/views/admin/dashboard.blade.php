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
                           <form id="formDelete{{ $lab->id }}" action="{{ route('admin.delete', $lab->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-primary btn-sm">cek Detail</button>
                                <button type="button" onclick="confirmDelete({{ $lab->id }})" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
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
<<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            dom: 'Bfrtip', // B = Buttons
            buttons: [
                'copy', 'excel', 'csv', 'pdf', 'print'
            ]
        });
    });
</script>
@endpush
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Data akan dihapus secara permanen.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formDelete' + id).submit();
        }
    });
}
</script>