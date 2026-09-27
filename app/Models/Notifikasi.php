<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi';
    protected $guarded = [];

    protected $casts = [
        'is_read' => 'boolean',
        'is_accent' => 'boolean',
        'read_at' => 'datetime',
    ];

    public function scopeUnread(Builder $query): Builder
    {
        return $query->where('is_read', false);
    }

    public function scopeForRecipient(Builder $query, string $id, ?string $role = null): Builder
    {
        $q = $query->where('recipient_id', $id);
        if ($role) {
            $q->where('recipient_role', $role);
        }
        return $q;
    }
}
