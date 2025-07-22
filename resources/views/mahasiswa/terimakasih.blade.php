@extends('layouts.template') {{-- Atau layouts yang kamu gunakan --}}

@section('content')

<div class="row justify-content-center">

            <div class="col-xl-10 col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                 <div class="container text-center mt-5">
                                    <h2 >Terima Kasih!</h2>
                                    <p>Data Anda telah berhasil dikirim.</p>
                                </div>
                                    <hr>
                                    <a href="{{route('mahasiswa.form')}}" class="btn btn-primary">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
@endsection