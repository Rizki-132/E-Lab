@extends('layouts.adminsiswa')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Selamat datang {{ Auth::user()->name }} Di Politeknik Mardira Indonesia</h1>
    <br>
</div>

@endsection