<?php

namespace Tests\Feature;

use App\Models\Activity;
use Tests\TestCase;

class ActivityInstructorPresentationTest extends TestCase
{
    public function test_activity_list_and_detail_use_the_same_instructor_name(): void
    {
        $activity = new Activity([
            'title' => 'Membaca Bersama',
            'category' => 'Literasi',
            'description' => 'Kegiatan membaca bersama.',
            'date' => '2026-09-13',
            'start_time' => '09:00',
            'end_time' => '10:00',
            'instructor' => 'Kak Rina',
            'location' => 'TBM Bintang Raharja',
            'is_active' => true,
        ]);
        $activity->id = 1;

        $index = view('activities.index', [
            'activities' => collect([$activity]),
        ])->render();

        $detail = view('activities.show', [
            'activity' => $activity,
        ])->render();

        $this->assertStringContainsString('Ka Nugan', $index);
        $this->assertStringContainsString('Ka Nugan', $detail);
        $this->assertStringContainsString('images/galih.jpeg', $index);
        $this->assertStringContainsString('images/galih.jpeg', $detail);
        $this->assertStringNotContainsString('Kak Rina', $detail);
    }

    public function test_ashila_alias_uses_her_profile_photo_path(): void
    {
        $activity = new Activity([
            'instructor' => 'Kak Siti',
        ]);

        $this->assertSame('Ka Ashila', $activity->instructor_display_name);
        $this->assertSame('images/kak-siti.jpg', $activity->instructor_image);
    }
}
