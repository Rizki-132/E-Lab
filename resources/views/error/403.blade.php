@extends('layouts.app')

@section('content')
<div class="text-center mt-5">
    <h1>403 - Akses Ditolak</h1>
    <p>Anda tidak memiliki izin untuk mengakses halaman ini.</p>
    <a href="{{ url('/login') }}" class="btn btn-primary mt-3">Kembali ke halaman login</a>
</div>
@endsection
