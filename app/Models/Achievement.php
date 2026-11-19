<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Achievement extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'type',
        'requirement_value',
        'reward_points',
        'is_active',
    ];

    protected $casts = [
        'requirement_value' => 'integer',
        'reward_points'     => 'integer',
        'is_active'         => 'boolean',
    ];


    /*
    |--------------------------------------------------------------------------
    | TYPE CONSTANTS
    |--------------------------------------------------------------------------
    */

    const TYPE_KEHADIRAN = 'kehadiran';
    const TYPE_MATERI    = 'materi';
    const TYPE_POIN      = 'poin';
    const TYPE_KHUSUS    = 'khusus';

    const TYPE_LABELS = [
        self::TYPE_KEHADIRAN => 'Kehadiran',
        self::TYPE_MATERI    => 'Materi',
        self::TYPE_POIN      => 'Poin',
        self::TYPE_KHUSUS    => 'Khusus',
    ];


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * User yang sudah mendapatkan achievement ini.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'user_achievements'
        )->withPivot('earned_at')->withTimestamps();
    }


    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
