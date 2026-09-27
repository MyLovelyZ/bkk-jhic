<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mitra extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'mitra';
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'tanggal_mou_mulai' => 'date',
        'tanggal_mou_selesai' => 'date',
    ];

    public function scopeVerified(Builder $query): Builder
    {
        return $query->where('is_verified', true);
    }

    public function lowongans(): HasMany
    {
        return $this->hasMany(Lowongan::class, 'mitra_id');
    }

    public function penempatanPkl(): HasMany
    {
        return $this->hasMany(PenempatanPkl::class, 'mitra_id');
    }
}
