@extends('layouts.template')
@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
 <a class="btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            <div class="col-xl-10 col-lg-6 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-lg-block bg-login-image">
                                <img src="" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Form Pengguna Komputer Lab</h1>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                     @if(session('success'))
                                        <p style="color:green">{{ session('success') }}</p>
                                    @endif
                                    <form class="user" action="{{ route('laporan.store')  }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control"
                                                id="exampleInputEmail" aria-describedby="isi nama " name="nama"
                                                placeholder="Masukan Nama">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control"
                                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="12" placeholder="Masukkan NIM"
                                                id="exampleInputPassword" name="nim" placeholder="Masukan NIM">
                                        </div>
                                         <div class="form-group">
                                             <select class="form-control" aria-label="Default select example" name="prodi">
                                                <option selected>--Pilih Prodi---</option>
                                                <option value="TRPL">Teknologi Rekayasa Perangkat Lunak</option>
                                                <option value="TRM">Teknologi Rekayasa Multimedia</option>
                                                <option value="Bisnis Digital">Bisnis Digital</option>
                                             </select>
                                        </div>
                                         <div class="form-group">
                                             <select class="form-control" aria-label="Default select example" name="semester">
                                                <option selected>--Pilih Semester---</option>
                                                <option value="1">Semester 1</option>
                                                <option value="2">Semester 2</option>
                                                <option value="3">Semester 3</option>
                                                <option value="4">Semester 4</option>
                                                <option value="5">Semester 5</option>
                                                <option value="6">Semester 6</option>
                                                <option value="7">Semester 7</option>
                                                <option value="8">Semester 8</option>
                                             </select>
                                        </div>
                                        <div class="form-group">
                                             <select class="form-control" aria-label="Default select example" name="lab">
                                                <option selected>--Pilih Lab---</option>
                                                <option value="Lab TRPL">Lab RPL</option>
                                                <option value="Lab TRM">Lab Multimedia</option>
                                                <option value="Lab BD">Lab Bisnis Digital</option>
                                             </select>
                                        </div>
                                          <div class="form-group">
                                            <input type="number" class="form-control form-control"
                                                id="exampleInputEmail" aria-describedby="isi nama " min="1" max="30" name="nomor_unit"
                                                placeholder="Nomor Unit Komputer">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control"
                                                id="exampleInputEmail" aria-describedby="isi nama " name="dosen"
                                                placeholder="Masukan Nama Dosen">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control"
                                                id="exampleInputEmail" aria-describedby="isi nama " name="matakuliah"
                                                placeholder="Masukan Mata kuliah">
                                        </div>
                                        <div class="form-group">
                                             <select class="form-control" aria-label="Default select example" name="keadaan_unit">
                                                <option selected>--Keadaan Unit---</option>
                                                <option value="Lengkap">Lengkap</option>
                                                <option value="Tidak Lengkap">Tidak Lengkap</option>
                                             </select>
                                        </div>
                                        <label for="file">Upload Foto Unit</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="inputGroupFile02" name="foto">
                                        </div>
                                        <label for="">Masukan Saran</label>
                                        <div class="input-group">
                                            <textarea class="form-control" aria-label="With textarea" style="resize: none;" name="saran"></textarea>
                                        </div>
                                        <br>
                                         <button type="submit" class="btn btn-primary btn-user btn-block">Kirim</button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection