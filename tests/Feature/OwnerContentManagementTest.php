<?php

namespace Tests\Feature;

use App\Models\AboutPage;
use App\Models\Activity;
use App\Models\Gallery;
use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class OwnerContentManagementTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_management_dashboard_requires_authentication(): void
    {
        $this->get(route('owner.dashboard'))
            ->assertRedirect(route('login'));
    }

    public function test_legacy_admin_cannot_open_the_management_dashboard(): void
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $this->actingAs($user)
            ->get(route('owner.dashboard'))
            ->assertForbidden();
    }

    public function test_pemilik_can_create_update_and_delete_an_activity(): void
    {
        Storage::fake('public');

        $owner = User::factory()->create([
            'role' => 'pemilik',
        ]);

        $this->actingAs($owner)
            ->post(route('owner.activities.store'), [
                'title' => 'Belajar Koding',
                'category' => 'Teknologi',
                'description' => 'Belajar pemrograman dasar.',
                'date' => '2026-12-01',
                'start_time' => '09:00',
                'end_time' => '11:00',
                'instructor' => 'Murni',
                'location' => 'TBM Bintang Raharja',
                'image' => UploadedFile::fake()->image('koding.jpg'),
                'is_active' => '1',
            ])
            ->assertRedirect(route('owner.activities.index'));

        $activity = Activity::query()->where('title', 'Belajar Koding')->firstOrFail();
        $imagePath = $activity->image;

        $this->assertDatabaseHas('activities', [
            'id' => $activity->id,
            'is_active' => true,
        ]);
        $this->assertStringEndsWith('.webp', $imagePath);
        Storage::disk('public')->assertExists($imagePath);

        $this->actingAs($owner)
            ->put(route('owner.activities.update', $activity), [
                'title' => 'Belajar Koding Lanjutan',
                'category' => 'Teknologi',
                'description' => 'Materi pemrograman lanjutan.',
                'date' => '2026-12-02',
                'start_time' => '10:00',
                'end_time' => '12:00',
                'instructor' => 'Murni',
                'location' => 'TBM Bintang Raharja',
                'is_active' => '1',
            ])
            ->assertRedirect(route('owner.activities.index'));

        $this->assertDatabaseHas('activities', [
            'id' => $activity->id,
            'title' => 'Belajar Koding Lanjutan',
        ]);
        $this->assertSame($imagePath, $activity->fresh()->image);

        $this->actingAs($owner)
            ->delete(route('owner.activities.destroy', $activity))
            ->assertRedirect(route('owner.activities.index'));

        $this->assertDatabaseMissing('activities', [
            'id' => $activity->id,
        ]);
        Storage::disk('public')->assertMissing($imagePath);
    }

    public function test_pemilik_can_create_update_and_delete_news(): void
    {
        Storage::fake('public');

        $owner = User::factory()->create([
            'role' => 'pemilik',
        ]);

        $this->actingAs($owner)
            ->post(route('owner.news.store'), [
                'title' => 'Kabar Literasi',
                'category' => 'Literasi',
                'slug' => 'kabar-literasi',
                'excerpt' => 'Ringkasan kabar.',
                'content' => 'Isi berita untuk masyarakat.',
                'author' => 'Murni',
                'image' => UploadedFile::fake()->image('literasi.jpg'),
                'published_at' => '2026-12-03',
                'is_published' => '1',
            ])
            ->assertRedirect(route('owner.news.index'));

        $news = News::query()->where('slug', 'kabar-literasi')->firstOrFail();
        $imagePath = $news->image;

        $this->assertDatabaseHas('news', [
            'id' => $news->id,
            'is_published' => true,
        ]);
        $this->assertStringEndsWith('.webp', $imagePath);
        Storage::disk('public')->assertExists($imagePath);

        $this->actingAs($owner)
            ->put(route('owner.news.update', $news), [
                'title' => 'Kabar Literasi Terbaru',
                'category' => 'Literasi',
                'slug' => 'kabar-literasi-terbaru',
                'excerpt' => 'Ringkasan terbaru.',
                'content' => 'Isi berita terbaru.',
                'author' => 'Murni',
                'published_at' => '2026-12-04',
                'is_published' => '0',
            ])
            ->assertRedirect(route('owner.news.index'));

        $this->assertDatabaseHas('news', [
            'id' => $news->id,
            'slug' => 'kabar-literasi-terbaru',
            'is_published' => false,
        ]);
        $this->assertSame($imagePath, $news->fresh()->image);

        $this->actingAs($owner)
            ->delete(route('owner.news.destroy', $news))
            ->assertRedirect(route('owner.news.index'));

        $this->assertDatabaseMissing('news', [
            'id' => $news->id,
        ]);
        Storage::disk('public')->assertMissing($imagePath);
    }

    public function test_pemilik_can_create_update_and_delete_gallery_items(): void
    {
        Storage::fake('public');

        $owner = User::factory()->create([
            'role' => 'pemilik',
        ]);

        $this->actingAs($owner)
            ->post(route('owner.gallery.store'), [
                'title' => 'Dokumentasi Membaca',
                'category' => 'Literasi',
                'description' => 'Kegiatan membaca bersama.',
                'image' => UploadedFile::fake()->image('membaca.jpg'),
                'date' => '2026-12-05',
                'is_active' => '1',
            ])
            ->assertRedirect(route('owner.gallery.index'));

        $gallery = Gallery::query()->where('title', 'Dokumentasi Membaca')->firstOrFail();
        $imagePath = $gallery->image;

        $this->assertDatabaseHas('galleries', [
            'id' => $gallery->id,
            'is_active' => true,
        ]);
        $this->assertStringEndsWith('.webp', $imagePath);
        Storage::disk('public')->assertExists($imagePath);

        $this->actingAs($owner)
            ->put(route('owner.gallery.update', $gallery), [
                'title' => 'Dokumentasi Membaca Ceria',
                'category' => 'Literasi',
                'description' => 'Foto kegiatan terbaru.',
                'date' => '2026-12-06',
                'is_active' => '0',
            ])
            ->assertRedirect(route('owner.gallery.index'));

        $this->assertDatabaseHas('galleries', [
            'id' => $gallery->id,
            'title' => 'Dokumentasi Membaca Ceria',
            'is_active' => false,
        ]);
        $this->assertSame($imagePath, $gallery->fresh()->image);

        $this->actingAs($owner)
            ->delete(route('owner.gallery.destroy', $gallery))
            ->assertRedirect(route('owner.gallery.index'));

        $this->assertDatabaseMissing('galleries', [
            'id' => $gallery->id,
        ]);
        Storage::disk('public')->assertMissing($imagePath);
    }

    public function test_activity_end_time_must_be_after_start_time(): void
    {
        $owner = User::factory()->create([
            'role' => 'pemilik',
        ]);

        $this->actingAs($owner)
            ->from(route('owner.activities.create'))
            ->post(route('owner.activities.store'), [
                'title' => 'Kegiatan dengan waktu tidak valid',
                'category' => 'Literasi',
                'date' => '2026-12-07',
                'start_time' => '11:00',
                'end_time' => '09:00',
            ])
            ->assertRedirect(route('owner.activities.create'))
            ->assertSessionHasErrors('end_time');

        $this->assertDatabaseMissing('activities', [
            'title' => 'Kegiatan dengan waktu tidak valid',
        ]);
    }

    public function test_image_larger_than_ten_megabytes_is_rejected_with_a_clear_message(): void
    {
        Storage::fake('public');
        $owner = User::factory()->create([
            'role' => 'pemilik',
        ]);

        $this->actingAs($owner)
            ->from(route('owner.activities.create'))
            ->post(route('owner.activities.store'), [
                'title' => 'Kegiatan dengan gambar terlalu besar',
                'category' => 'Literasi',
                'date' => '2026-12-08',
                'start_time' => '09:00',
                'end_time' => '10:00',
                'image' => UploadedFile::fake()->image('terlalu-besar.jpg')->size(10241),
            ])
            ->assertRedirect(route('owner.activities.create'))
            ->assertSessionHasErrors('image')
            ->assertSessionHas('errors', fn ($errors): bool => $errors->getBag('default')->first('image') === 'Ukuran gambar kegiatan maksimal 10 MB.');

        $this->assertDatabaseMissing('activities', [
            'title' => 'Kegiatan dengan gambar terlalu besar',
        ]);
        Storage::disk('public')->assertDirectoryEmpty('uploads/activities');
    }

    public function test_owner_can_update_about_text_lists_and_upload_compressed_images(): void
    {
        Storage::fake('public');
        $owner = User::factory()->create([
            'role' => 'pemilik',
        ]);
        $content = config('tbm.about');
        unset($content['images']);
        $content['overview']['paragraphs'][] = 'Paragraf tambahan.';
        $content['biography']['paragraphs'][] = 'Paragraf biografi tambahan.';
        $content['mission']['items'][] = 'Misi tambahan.';
        $content['history']['items'][] = [
            'year' => '2026',
            'title' => 'Perjalanan tambahan',
            'description' => 'Deskripsi perjalanan tambahan.',
        ];
        $content['values']['items'][] = [
            'title' => 'Nilai tambahan',
            'description' => 'Deskripsi nilai tambahan.',
        ];
        $content['images'] = [
            'logo' => UploadedFile::fake()->image('logo.png'),
            'biography' => UploadedFile::fake()->image('biografi.png'),
        ];

        $this->actingAs($owner)
            ->get(route('owner.about.edit'))
            ->assertOk()
            ->assertSee('data-repeater-template');

        $this->actingAs($owner)
            ->put(route('owner.about.update'), $content)
            ->assertRedirect(route('owner.about.edit'));

        $aboutPage = AboutPage::query()->findOrFail(1);
        $this->assertSame('Paragraf tambahan.', $aboutPage->content['overview']['paragraphs'][2]);
        $this->assertSame('Paragraf biografi tambahan.', $aboutPage->content['biography']['paragraphs'][5]);
        $this->assertSame('Misi tambahan.', $aboutPage->content['mission']['items'][4]);
        $this->assertSame('Perjalanan tambahan', $aboutPage->content['history']['items'][12]['title']);
        $this->assertSame('Nilai tambahan', $aboutPage->content['values']['items'][4]['title']);
        $this->assertStringEndsWith('.webp', $aboutPage->content['images']['logo']);
        $this->assertStringEndsWith('.webp', $aboutPage->content['images']['biography']);
        Storage::disk('public')->assertExists($aboutPage->content['images']['logo']);
        Storage::disk('public')->assertExists($aboutPage->content['images']['biography']);
    }
}
