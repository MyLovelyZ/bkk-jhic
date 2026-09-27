<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TracerKuesioner extends Model
{
    use HasFactory;

    protected $table = 'tracer_kuesioner';
    protected $guarded = [];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'is_aktif' => 'boolean',
    ];

    public function scopeAktif(Builder $query): Builder
    {
        return $query->where('is_aktif', true);
    }

    public function pertanyaans(): HasMany
    {
        return $this->hasMany(TracerPertanyaan::class, 'kuesioner_id')->orderBy('urutan');
    }

    public function respons(): HasMany
    {
        return $this->hasMany(TracerRespon::class, 'kuesioner_id');
    }
}
