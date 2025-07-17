<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
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
    public function show($id)
    {
        $report = Laporan::findOrFail($id);
        return view('admin.show', compact('report'));
    }

    public function print()
    {
        $reports = Laporan::all();
        return view('admin.print', compact('reports'));
    }

    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);

        // Hapus file foto dari storage
        if ($laporan->foto && file_exists(public_path($laporan->foto))) {
        unlink(public_path($laporan->foto));
        }

        // Hapus data dari database
        $laporan->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Data dan foto berhasil dihapus.');
    }
}
