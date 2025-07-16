<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $fillable = [
    'nama', 'nim', 'prodi', 'semester', 'lab',
    'nomor_unit', 'dosen', 'matakuliah',
    'keadaan_unit', 'foto', 'saran'
    ];

}
