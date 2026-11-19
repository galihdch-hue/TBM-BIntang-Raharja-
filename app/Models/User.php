<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role', 'points'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;


    /*
    |--------------------------------------------------------------------------
    | CASTS
    |--------------------------------------------------------------------------
    */

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'points'            => 'integer',
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | ROLE HELPERS
    |--------------------------------------------------------------------------
    */

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isPengajar(): bool
    {
        return $this->role === 'pengajar';
    }

    public function isPeserta(): bool
    {
        return $this->role === 'peserta';
    }


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Kehadiran peserta di setiap kegiatan.
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * Progress membaca materi.
     */
    public function materialProgress(): HasMany
    {
        return $this->hasMany(UserMaterialProgress::class);
    }

    /**
     * Achievement / prestasi yang sudah diraih.
     */
    public function achievements(): BelongsToMany
    {
        return $this->belongsToMany(
            Achievement::class,
            'user_achievements'
        )->withPivot('earned_at')->withTimestamps();
    }

    /**
     * Kegiatan yang pernah dihadiri (status: hadir).
     */
    public function attendedActivities(): BelongsToMany
    {
        return $this->belongsToMany(
            Activity::class,
            'attendances'
        )->wherePivot('status', 'hadir')->withPivot('status', 'note')->withTimestamps();
    }

    /**
     * Materi yang sudah selesai dibaca.
     */
    public function completedMaterials(): BelongsToMany
    {
        return $this->belongsToMany(
            Material::class,
            'user_material_progress'
        )->wherePivot('status', 'selesai')->withPivot('status', 'completed_at')->withTimestamps();
    }


    /*
    |--------------------------------------------------------------------------
    | COMPUTED STATS
    |--------------------------------------------------------------------------
    */

    /**
     * Persentase kehadiran (hadir / total absensi yang ada).
     */
    public function attendancePercentage(): float
    {
        $total = $this->attendances()->count();

        if ($total === 0) {
            return 0;
        }

        $hadir = $this->attendances()
            ->where('status', 'hadir')
            ->count();

        return round(($hadir / $total) * 100, 1);
    }

    /**
     * Jumlah materi yang sudah selesai.
     */
    public function completedMaterialsCount(): int
    {
        return $this->materialProgress()
            ->where('status', 'selesai')
            ->count();
    }

    /**
     * Jumlah kegiatan yang dihadiri.
     */
    public function attendedActivitiesCount(): int
    {
        return $this->attendances()
            ->where('status', 'hadir')
            ->count();
    }
}
