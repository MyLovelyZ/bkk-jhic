<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanKerjasama extends Model
{
    use HasFactory;

    protected $table = 'permohonan_kerjasama';
    protected $guarded = [];

    protected $casts = [
        'jenis_kerjasama' => 'array',
    ];

    public function scopeMenunggu(Builder $query): Builder
    {
        return $query->where('status', 'MENUNGGU_REVIEW');
    }
}
