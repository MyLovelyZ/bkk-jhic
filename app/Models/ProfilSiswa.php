<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProfilSiswa extends Model
{
    use HasFactory;

    protected $table = 'profil_siswa';
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];

    protected $casts = [
        'kelengkapan_profil' => 'integer',
    ];

    public function resumes(): HasMany
    {
        return $this->hasMany(CvResume::class, 'siswa_id', 'user_id');
    }

    public function primaryResume(): HasOne
    {
        return $this->hasOne(CvResume::class, 'siswa_id', 'user_id')->where('is_primary', true);
    }

    public function lamarans(): HasMany
    {
        return $this->hasMany(Lamaran::class, 'siswa_id', 'user_id');
    }

    public function penempatanPkl(): HasMany
    {
        return $this->hasMany(PenempatanPkl::class, 'siswa_id', 'user_id');
    }

    public function activePkl(): HasOne
    {
        return $this->hasOne(PenempatanPkl::class, 'siswa_id', 'user_id')->where('status', 'BERJALAN');
    }

    public function tracerRespons(): HasMany
    {
        return $this->hasMany(TracerRespon::class, 'alumni_id', 'user_id');
    }
}
