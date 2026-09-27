<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TracerPertanyaan extends Model
{
    use HasFactory;

    protected $table = 'tracer_pertanyaan';
    protected $guarded = [];

    protected $casts = [
        'opsi_jawaban_json' => 'array',
        'kondisi_tampil_json' => 'array',
        'is_wajib' => 'boolean',
        'urutan' => 'integer',
    ];

    public function kuesioner(): BelongsTo
    {
        return $this->belongsTo(TracerKuesioner::class, 'kuesioner_id');
    }

    public function jawabanDetails(): HasMany
    {
        return $this->hasMany(TracerJawabanDetail::class, 'pertanyaan_id');
    }
}
