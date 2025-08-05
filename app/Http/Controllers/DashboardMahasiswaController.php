<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardMahasiswaController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboardmhs()
    {
        return view('mahasiswa.dashboardsiswa');
    }
}
