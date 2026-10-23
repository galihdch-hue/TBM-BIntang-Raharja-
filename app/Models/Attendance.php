<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    protected $fillable = [
        'user_id',
        'activity_id',
        'status',
        'note',
    ];

    /*
    |--------------------------------------------------------------------------
    | STATUS CONSTANTS
    |--------------------------------------------------------------------------
    */

    const STATUS_HADIR       = 'hadir';
    const STATUS_TIDAK_HADIR = 'tidak_hadir';
    const STATUS_IZIN        = 'izin';

    const STATUSES = [
        self::STATUS_HADIR,
        self::STATUS_TIDAK_HADIR,
        self::STATUS_IZIN,
    ];

    const STATUS_LABELS = [
        self::STATUS_HADIR       => 'Hadir',
        self::STATUS_TIDAK_HADIR => 'Tidak Hadir',
        self::STATUS_IZIN        => 'Izin',
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

    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }


    /*
    |--------------------------------------------------------------------------
    | HELPERS
    |--------------------------------------------------------------------------
    */

    public function getStatusLabelAttribute(): string
    {
        return self::STATUS_LABELS[$this->status] ?? $this->status;
    }

    public function isHadir(): bool
    {
        return $this->status === self::STATUS_HADIR;
    }
}
