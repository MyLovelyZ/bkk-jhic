<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CvResume extends Model
{
    use HasFactory;

    protected $table = 'cv_resumes';
    protected $guarded = [];

    protected $casts = [
        'is_primary' => 'boolean',
        'skor_total_ai' => 'integer',
        'skor_parameter_json' => 'array',
        'saran_perbaikan_ai_json' => 'array',
        'terakhir_dianalisis_ai' => 'datetime',
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(ProfilSiswa::class, 'siswa_id', 'user_id');
    }

    public function pendidikan(): HasMany
    {
        return $this->hasMany(CvPendidikan::class, 'cv_id')->orderBy('urutan');
    }

    public function pengalaman(): HasMany
    {
        return $this->hasMany(CvPengalaman::class, 'cv_id')->orderBy('urutan');
    }

    public function keahlian(): HasMany
    {
        return $this->hasMany(CvKeahlian::class, 'cv_id');
    }

    public function sertifikat(): HasMany
    {
        return $this->hasMany(CvSertifikat::class, 'cv_id');
    }

    public function lamarans(): HasMany
    {
        return $this->hasMany(Lamaran::class, 'cv_id');
    }
}
