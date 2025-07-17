<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\Storage;
class LaporanController extends Controller
{
    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'nama' => 'required',
            'nim' => 'required|digits_between:8,12',
            'prodi' => 'required',
            'semester' => 'required',
            'lab' => 'required',
            'nomor_unit' => 'required|integer|min:1|max:30',
            'dosen' => 'required',
            'matakuliah' => 'required',
            'keadaan_unit' => 'required|in:Lengkap,Tidak Lengkap',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'saran' => 'nullable|string'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $validated['foto'] = 'uploads/' . $filename;
        }

        Laporan::create($validated);
        return redirect()->route('terimakasih')->with('success', 'Data berhasil dikirim.');
    }
}
