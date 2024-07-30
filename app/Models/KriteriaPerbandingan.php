<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaPerbandingan extends Model
{
    use HasFactory;

    protected $table = 'kriteria_perbandingan';

    protected $fillable = [
        'kriteria_baris',
        'kriteria_kolom',
        'bobot_baris',
        'bobot_kolom',
    ];
}
