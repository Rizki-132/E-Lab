<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dashboard()
    {
        $reports = Laporan::latest()->get();
        return view('admin.dashboard', compact('reports'));
    }
    public function dataLaporan(Request $request)
    {
        if ($request->ajax()) {
            $data = Laporan::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }
    public function print()
    {
        $reports = Laporan::all();
        return view('admin.print', compact('reports'));
    }
}
