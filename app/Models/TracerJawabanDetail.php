<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TracerJawabanDetail extends Model
{
    use HasFactory;

    protected $table = 'tracer_jawaban_detail';
    protected $guarded = [];

    protected $casts = [
        'jawaban_json' => 'array',
    ];

    public function respon(): BelongsTo
    {
        return $this->belongsTo(TracerRespon::class, 'respon_id');
    }

    public function pertanyaan(): BelongsTo
    {
        return $this->belongsTo(TracerPertanyaan::class, 'pertanyaan_id');
    }
}
