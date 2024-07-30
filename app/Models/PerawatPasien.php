<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerawatPasien extends Model
{
    use HasFactory;

    protected $table = 'perawat_pasien';

    protected $fillable = [
        'user_id',
        'pasien_id',
    ];

    public function perawat(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }
}
