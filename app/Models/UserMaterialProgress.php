<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserMaterialProgress extends Model
{
    protected $table = 'user_material_progress';

    protected $fillable = [
        'user_id',
        'material_id',
        'status',
        'completed_at',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];


    /*
    |--------------------------------------------------------------------------
    | STATUS CONSTANTS
    |--------------------------------------------------------------------------
    */

    const STATUS_BELUM_DIBACA  = 'belum_dibaca';
    const STATUS_SEDANG_DIBACA = 'sedang_dibaca';
    const STATUS_SELESAI       = 'selesai';

    const STATUSES = [
        self::STATUS_BELUM_DIBACA,
        self::STATUS_SEDANG_DIBACA,
        self::STATUS_SELESAI,
    ];

    const STATUS_LABELS = [
        self::STATUS_BELUM_DIBACA  => 'Belum Dibaca',
        self::STATUS_SEDANG_DIBACA => 'Sedang Dibaca',
        self::STATUS_SELESAI       => 'Selesai',
    ];


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }


    /*
    |--------------------------------------------------------------------------
    | HELPERS
    |--------------------------------------------------------------------------
    */

    public function isSelesai(): bool
    {
        return $this->status === self::STATUS_SELESAI;
    }

    public function getStatusLabelAttribute(): string
    {
        return self::STATUS_LABELS[$this->status] ?? $this->status;
    }
}
