<?php

namespace Tests\Feature;

use App\Models\Activity;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class HomeActivitySyncTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_homepage_displays_active_activities_from_the_database(): void
    {
        $activity = Activity::create([
            'title' => 'Belajar Koding',
            'category' => 'Teknologi',
            'description' => 'Belajar dasar pemrograman.',
            'date' => '2026-11-22',
            'start_time' => '09:00',
            'end_time' => '11:00',
            'location' => 'TBM Bintang Raharja',
            'is_active' => true,
        ]);

        Activity::create([
            'title' => 'Kegiatan Disembunyikan',
            'category' => 'Lainnya',
            'date' => '2026-11-23',
            'start_time' => '09:00',
            'end_time' => '10:00',
            'is_active' => false,
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee('Belajar Koding')
            ->assertSee('Teknologi')
            ->assertSee('09:00')
            ->assertSee('11:00')
            ->assertSee(route('activities.show', $activity))
            ->assertDontSee('Kegiatan Disembunyikan');
    }
}
