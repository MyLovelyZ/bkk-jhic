<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lamaran extends Model
{
    use HasFactory;

    protected $table = 'lamaran';
    protected $guarded = [];

    protected $casts = [
        'tanggal_melamar' => 'date',
        'skor_match_ai' => 'integer',
        'step_tahapan' => 'integer',
    ];

    public function lowongan(): BelongsTo
    {
        return $this->belongsTo(Lowongan::class, 'lowongan_id');
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(ProfilSiswa::class, 'siswa_id', 'user_id');
    }

    public function cv(): BelongsTo
    {
        return $this->belongsTo(CvResume::class, 'cv_id');
    }

    public function interview(): HasOne
    {
        return $this->hasOne(JadwalInterview::class, 'lamaran_id');
    }

    public function riwayatStatus(): HasMany
    {
        return $this->hasMany(LamaranRiwayatStatus::class, 'lamaran_id')->latest('created_at');
    }
}
