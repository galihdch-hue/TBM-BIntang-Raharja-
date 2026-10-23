<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    protected $fillable = [
        'title',
        'category',
        'description',
        'content',
        'type',
        'file',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Semua data progress untuk materi ini.
     */
    public function progressRecords(): HasMany
    {
        return $this->hasMany(UserMaterialProgress::class);
    }

    /**
     * Peserta yang sudah menyelesaikan materi ini.
     */
    public function completedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'user_material_progress'
        )->wherePivot('status', 'selesai')
            ->withPivot('status', 'completed_at')
            ->withTimestamps();
    }


    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * Hanya materi yang sudah dipublikasikan.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
