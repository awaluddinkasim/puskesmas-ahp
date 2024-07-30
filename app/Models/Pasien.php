<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';

    protected $fillable = [
        'no_rekam_medis',
        'nama',
        'alamat',
        'no_hp',
        'tgl_lahir',
        'jk',
        'status_nikah',
        'pekerjaan',
        'pendidikan',
        'keluhan',
        'riwayat_penyakit',
        'riwayat_alergi',
        'riwayat_obat',
    ];
}
