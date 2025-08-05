<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Carbon\Carbon;
use App\Models\user;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\LoginLog; 

class AdminController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
   public function dashboard()
    {
        $totalUsers = User::count(); // Semua akun
        $totalSiswa = User::where('role', 'siswa')->count(); // Akun siswa saja
        $totalLogin = LoginLog::count(); // Jumlah total login

        $users = User::paginate(4);
        $reports = Laporan::latest()->get();
        $totalSaran = Laporan::whereNotNull('saran')->where('saran', '!=', '')->count();

        return view('admin.dashboard', compact('totalUsers', 'totalSiswa', 'totalLogin', 'users','reports','totalSaran'));
    }

    // Untuk ChartJs
   public function chartLoginData()
    {
        $logins = collect();
        $labels = collect();

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $count = User::where('role', 'siswa')
                        ->whereDate('last_login_at', $date)
                        ->count();
            $labels->push($date->format('d M'));
            $logins->push($count);
        }

        return response()->json([
            'labels' => $labels,
            'data' => $logins
        ]);
    }

// Untuk Fungsi Admin

    public function tabelkunjungan()
    {
        $reports = Laporan::latest()->get();
        return view('admin.tabelkunjungan', compact('reports'));
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

    public function destroyLaporan($id)
    {
        $laporan = Laporan::findOrFail($id);

        // Hapus file foto dari storage
        if ($laporan->foto && file_exists(public_path($laporan->foto))) {
        unlink(public_path($laporan->foto));
        }

        // Hapus data dari database
        $laporan->delete();

        return redirect()->route('admin.tabelkunjungan')->with('success', 'Data dan foto berhasil dihapus.');
    }

    // Untuk User
     public function indexUser()
    {
        $users = User::all();
        return view('admin.usertable', compact('users'));
        // return view('admin.usertable');
    }
     public function createUser()
    {
        return view('admin.createUser');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,siswa,user',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);

        return redirect()->route('admin.tabelUser')->with('success', 'User berhasil ditambahkan.');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.editUser', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,siswa,user',
            'password' => 'nullable|min:6',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin.createUser')->with('success', 'User berhasil diupdate.');
    }

    public function destroyUser($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }
}
