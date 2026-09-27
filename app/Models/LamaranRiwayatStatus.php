<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LamaranRiwayatStatus extends Model
{
    use HasFactory;

    protected $table = 'lamaran_riwayat_status';
    protected $guarded = [];
    public $timestamps = false;

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function lamaran(): BelongsTo
    {
        return $this->belongsTo(Lamaran::class, 'lamaran_id');
    }
}
