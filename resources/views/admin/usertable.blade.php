@extends('layouts.adminlayout')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Akun Lab</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="{{ route('admin.createUser') }}" class="btn btn-success mb-3">+ Tambah User</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                  @php
                    $no = 1;
                @endphp
                @foreach($users as $item)
                <tbody>
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->password }}</td>
                        <td>{{ $item->role }}</td>
                        <td>
                            <form id="formDelete{{ $item->id }}" action="{{ route('admin.destroyUser', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                @if($item->role === 'admin')
                                     <button class="btn btn-danger btn-sm" disabled>Hapus</button>
                                @else
                                    <button type="button" onclick="confirmDelete({{ $item->id }})" class="btn btn-danger btn-sm">Hapus</button>
                                @endif
                                {{-- <button type="button" onclick="confirmDelete({{ $item->id }})" class="btn btn-danger btn-sm">Hapus</button> --}}
                            </form>
                        </td>
                    </tr>
                 </tbody>
            @endforeach
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
