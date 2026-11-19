<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    private const INSTRUCTOR_DISPLAY_NAMES = [
        'Kak Rina' => 'Ka Nugan',
        'Kak Nugan' => 'Ka Nugan',
        'Ka Nugan' => 'Ka Nugan',
        'Rina' => 'Galih',
        'Galih' => 'Galih',
        'Kak Siti' => 'Ka Ashila',
        'Ka Ashila' => 'Ka Ashila',
        'Siti' => 'Siti',
        'Kak Dimas' => 'Ka Agung',
        'Ka Agung' => 'Ka Agung',
        'Dimas' => 'Dimas',
    ];

    private const INSTRUCTOR_IMAGES = [
        'Kak Rina' => 'images/galih.jpeg',
        'Kak Nugan' => 'images/galih.jpeg',
        'Ka Nugan' => 'images/galih.jpeg',
        'Rina' => 'images/galih.jpeg',
        'Galih' => 'images/galih.jpeg',
        'Kak Siti' => 'images/kak-siti.jpg',
        'Ka Ashila' => 'images/kak-siti.jpg',
        'Siti' => 'images/kak-siti.jpg',
        'Kak Dimas' => 'images/kak-dimas.jpg',
        'Ka Agung' => 'images/kak-dimas.jpg',
        'Dimas' => 'images/kak-dimas.jpg',
    ];

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
        'date' => 'date',
        'is_active' => 'boolean',
    ];

    public function getInstructorDisplayNameAttribute(): ?string
    {
        if (! $this->instructor) {
            return null;
        }

        return self::INSTRUCTOR_DISPLAY_NAMES[$this->instructor]
            ?? $this->instructor;
    }

    public function getInstructorImageAttribute(): ?string
    {
        return self::INSTRUCTOR_IMAGES[$this->instructor] ?? null;
    }
}
