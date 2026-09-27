<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PklLaporanAkhir extends Model
{
    use HasFactory;

    protected $table = 'pkl_laporan_akhir';
    protected $guarded = [];

    protected $casts = [
        'nomor_bab' => 'integer',
        'terakhir_diperbarui' => 'date',
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
