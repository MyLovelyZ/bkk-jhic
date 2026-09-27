<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PklJurnalHarian extends Model
{
    use HasFactory;

    protected $table = 'pkl_jurnal_harian';
    protected $guarded = [];

    protected $casts = [
        'tanggal' => 'date',
        'durasi_jam' => 'integer',
        'divalidasi_pada' => 'datetime',
    ];

    public function penempatan(): BelongsTo
    {
        return $this->belongsTo(PenempatanPkl::class, 'penempatan_pkl_id');
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(ProfilSiswa::class, 'siswa_id', 'user_id');
    }
}
