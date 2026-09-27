<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JadwalInterview extends Model
{
    use HasFactory;

    protected $table = 'jadwal_interview';
    protected $guarded = [];

    protected $casts = [
        'tanggal_interview' => 'date',
    ];

    public function lamaran(): BelongsTo
    {
        return $this->belongsTo(Lamaran::class, 'lamaran_id');
    }
}
