<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TracerRespon extends Model
{
    use HasFactory;

    protected $table = 'tracer_respon';
    protected $guarded = [];

    protected $casts = [
        'tanggal_pengisian' => 'datetime',
        'waktu_tunggu_bulan' => 'integer',
    ];

    public function kuesioner(): BelongsTo
    {
        return $this->belongsTo(TracerKuesioner::class, 'kuesioner_id');
    }

    public function alumni(): BelongsTo
    {
        return $this->belongsTo(ProfilSiswa::class, 'alumni_id', 'user_id');
    }

    public function profilSiswa(): BelongsTo
    {
        return $this->belongsTo(ProfilSiswa::class, 'alumni_id', 'user_id');
    }

    public function jawabanDetails(): HasMany
    {
        return $this->hasMany(TracerJawabanDetail::class, 'respon_id');
    }
}
