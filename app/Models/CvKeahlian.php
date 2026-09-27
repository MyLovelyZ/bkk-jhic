<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CvKeahlian extends Model
{
    use HasFactory;

    protected $table = 'cv_keahlian';
    protected $guarded = [];

    public function resume(): BelongsTo
    {
        return $this->belongsTo(CvResume::class, 'cv_id');
    }
}
