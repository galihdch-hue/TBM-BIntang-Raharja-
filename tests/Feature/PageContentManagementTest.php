<?php

namespace Tests\Feature;

use App\Models\PageContent;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PageContentManagementTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_owner_can_update_homepage_content_lists_and_images(): void
    {
        Storage::fake('public');
        $owner = User::factory()->create([
            'role' => 'pemilik',
        ]);
        $content = config('pages.home');
        unset($content['images'], $content['icon_options']);
        foreach ($content['partners']['items'] as &$partner) {
            unset($partner['icon']);
        }
        unset($partner);

        $content['hero']['title'] = 'Beranda Diperbarui';
        $content['partners']['items'][0]['icon'] = UploadedFile::fake()->image('partner.jpg');
        $content['hero']['focus'][] = [
            'label' => 'Program',
            'value' => 'Kreatif',
            'icon' => 'books.png',
        ];
        $content['history']['items'][] = [
            'year' => '2026',
            'title' => 'Perjalanan Baru',
            'description' => 'Konten sejarah baru di Beranda.',
        ];
        $content['images'] = [
            'hero' => UploadedFile::fake()->image('beranda.jpg'),
            'about' => UploadedFile::fake()->image('tentang.jpg'),
        ];

        $this->actingAs($owner)
            ->get(route('owner.home.edit'))
            ->assertOk()
            ->assertSee('data-repeater-template');

        $this->actingAs($owner)
            ->put(route('owner.home.update'), $content)
            ->assertRedirect(route('owner.home.edit'));

        $pageContent = PageContent::query()->where('slug', 'home')->firstOrFail();
        $this->assertSame('Beranda Diperbarui', $pageContent->content['hero']['title']);
        $this->assertSame('Perjalanan Baru', $pageContent->content['history']['items'][4]['title']);
        $this->assertStringEndsWith('.webp', $pageContent->content['images']['hero']);
        $this->assertStringEndsWith('.webp', $pageContent->content['images']['about']);
        $partnerLogoPath = $pageContent->content['partners']['items'][0]['icon'];
        $this->assertStringEndsWith('.webp', $partnerLogoPath);
        Storage::disk('public')->assertExists($pageContent->content['images']['hero']);
        Storage::disk('public')->assertExists($pageContent->content['images']['about']);
        Storage::disk('public')->assertExists($partnerLogoPath);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Beranda Diperbarui')
            ->assertSee('Perjalanan Baru')
            ->assertSee($partnerLogoPath);
    }

    public function test_owner_can_add_update_and_remove_contact_people_and_photos(): void
    {
        Storage::fake('public');
        $owner = User::factory()->create([
            'role' => 'pemilik',
        ]);
        $content = config('pages.contact');

        foreach ($content['people'] as &$person) {
            unset($person['photo']);
        }
        unset($person);

        unset($content['people'][1]);
        $content['people'][4] = [
            'name' => 'Kontak Baru',
            'role' => 'Relawan',
            'description' => 'Kontak tambahan TBM.',
            'phone' => '+62 812-3456-7890',
            'email' => 'kontak@example.test',
            'photo' => UploadedFile::fake()->image('kontak.jpg'),
        ];
        $content['people'][0]['description'] = 'Ketua TBM yang dapat dihubungi.';

        $this->actingAs($owner)
            ->get(route('owner.contact.edit'))
            ->assertOk()
            ->assertSee('data-repeater-template');

        $this->actingAs($owner)
            ->put(route('owner.contact.update'), $content)
            ->assertRedirect(route('owner.contact.edit'));

        $pageContent = PageContent::query()->where('slug', 'contact')->firstOrFail();
        $photoPath = $pageContent->content['people'][3]['photo'];
        $this->assertCount(4, $pageContent->content['people']);
        $this->assertSame('Ketua TBM yang dapat dihubungi.', $pageContent->content['people'][0]['description']);
        $this->assertSame('Kontak Baru', $pageContent->content['people'][3]['name']);
        $this->assertStringEndsWith('.webp', $photoPath);
        $this->assertTrue(Storage::disk('public')->exists($photoPath));

        $this->get(route('contact.index'))
            ->assertOk()
            ->assertSee('Kontak Baru')
            ->assertSee('https://wa.me/6281234567890')
            ->assertSee('kontak@example.test')
            ->assertDontSee('Galih Dwi Chandra');

        $content = $pageContent->content;
        foreach ($content['people'] as &$person) {
            unset($person['photo']);
        }
        unset($person, $content['people'][3]);

        $this->actingAs($owner)
            ->put(route('owner.contact.update'), $content)
            ->assertRedirect(route('owner.contact.edit'));

        $this->assertFalse(Storage::disk('public')->exists($photoPath));
        $this->assertDatabaseHas('page_contents', [
            'slug' => 'contact',
        ]);
    }

    public function test_page_content_editors_require_management_access(): void
    {
        $this->get(route('owner.home.edit'))
            ->assertRedirect(route('login'));

        $this->get(route('owner.contact.edit'))
            ->assertRedirect(route('login'));
    }
}
