<?php

namespace Tests\Feature;

use App\Models\Activity;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ActivityInstructorPresentationTest extends TestCase
{
    use LazilyRefreshDatabase;

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
        $activity->setAttribute('instructor_image_url', asset('images/galih.jpeg'));

        $index = view('activities.index', [
            'activities' => collect([$activity]),
        ])->render();

        $detail = view('activities.show', [
            'activity' => $activity,
        ])->render();

        $this->assertStringContainsString('Ka Nugan', $index);
        $this->assertStringContainsString('Ka Nugan', $detail);
        $this->assertStringContainsString(asset('images/galih.jpeg'), $index);
        $this->assertStringContainsString(asset('images/galih.jpeg'), $detail);
        $this->assertStringNotContainsString('Kak Rina', $detail);
    }

    public function test_uploaded_instructor_photo_is_clickable_on_activity_list_and_detail(): void
    {
        Storage::fake('public');
        $photoPath = 'uploads/activities/pemateri.webp';
        Storage::disk('public')->put($photoPath, 'foto pemateri');

        $activity = Activity::query()->create([
            'title' => 'Kegiatan Literasi',
            'category' => 'Literasi',
            'date' => '2026-12-01',
            'start_time' => '09:00',
            'end_time' => '10:00',
            'instructor' => 'Kak Siti',
            'instructor_photo' => $photoPath,
            'is_active' => true,
        ]);
        $photoUrl = asset('storage/'.$photoPath);

        $this->get(route('activities.index'))
            ->assertOk()
            ->assertSee('data-instructor-photo="'.$photoUrl.'"', false)
            ->assertSee('aria-label="Lihat foto pengajar Ka Ashila"', false)
            ->assertSee('id="instructor-lightbox"', false);

        $this->get(route('activities.show', $activity))
            ->assertOk()
            ->assertSee('data-instructor-photo="'.$photoUrl.'"', false)
            ->assertSee('aria-label="Lihat foto pengajar Ka Ashila"', false)
            ->assertSee('id="instructor-lightbox"', false);
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
