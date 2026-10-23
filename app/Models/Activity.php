<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activity extends Model
{
    protected $fillable = [
        'title',
        'category',
        'description',
        'date',
        'start_time',
        'end_time',
        'instructor',
        'location',
        'image',
        'is_active',
    ];

    protected $casts = [
        'date'      => 'date',
        'is_active' => 'boolean',
    ];


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Semua data kehadiran untuk kegiatan ini.
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * Peserta yang hadir pada kegiatan ini.
     */
    public function attendees(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'attendances'
        )->withPivot('status', 'note')->withTimestamps();
    }


    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * Hanya kegiatan yang aktif.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Kegiatan mendatang (tanggal >= hari ini).
     */
    public function scopeUpcoming($query)
    {
        return $query->where('date', '>=', now()->toDateString());
    }
}