<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CvPengalaman extends Model
{
    use HasFactory;

    protected $table = 'cv_pengalaman';
    protected $guarded = [];

    protected $casts = [
        'is_current' => 'boolean',
        'urutan' => 'integer',
    ];

    public function resume(): BelongsTo
    {
        return $this->belongsTo(CvResume::class, 'cv_id');
    }
}
