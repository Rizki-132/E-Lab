@extends('layouts.template')

@section('content')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Membuat Akun</h1>
                            </div>
                             <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                 <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Masukan Nama Anda" name="name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Alamat Email" name="email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password"  name="password_confirmation">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Membuat Akun
                                </button>
                                <hr>
                            </form>
                             <div class="text-center">
                                  @if (Route::has('password.request'))
                                            <a class="small" href="{{ route('password.request') }}">
                                                {{ __('Lupa Password') }}
                                            </a>
                                    @endif
                                </div>
                                <div class="text-center">
                                     @if (Route::has('login'))
                                    <a class="small" href="{{ route('login') }}">{{ __('Sudah Punya Akun?') }}</a>
                                     @endif    
                                 </div>                                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection