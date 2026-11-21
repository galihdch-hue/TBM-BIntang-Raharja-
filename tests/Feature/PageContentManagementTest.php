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

    public function test_uploaded_homepage_images_use_the_request_host_when_disk_url_is_stale(): void
    {
        config([
            'filesystems.disks.public.url' => 'http://localhost:8000/storage',
        ]);
        PageContent::query()->create([
            'slug' => 'home',
            'content' => [
                'images' => [
                    'hero' => 'uploads/home/hero.webp',
                ],
            ],
        ]);

        $this->get('http://tbm-bintang-raharja.test/')
            ->assertOk()
            ->assertSee(
                'src="http://tbm-bintang-raharja.test/storage/uploads/home/hero.webp"',
                false,
            );
    }

    public function test_owner_can_replace_and_add_collaborator_logos(): void
    {
        Storage::fake('public');
        $owner = User::factory()->create([
            'role' => 'pemilik',
        ]);
        $existingLogoPath = 'uploads/partners/logo-lama.webp';
        $existingContent = config('pages.home');
        $existingContent['partners']['items'][0]['icon'] = $existingLogoPath;
        PageContent::query()->create([
            'slug' => 'home',
            'content' => $existingContent,
        ]);
        Storage::disk('public')->put($existingLogoPath, 'logo lama');

        $content = config('pages.home');
        unset($content['images'], $content['icon_options']);
        foreach ($content['partners']['items'] as &$partner) {
            unset($partner['icon']);
        }
        unset($partner);
        $content['partners']['items'][0]['icon'] = UploadedFile::fake()->image('logo-baru.png');
        $content['partners']['items'][] = [
            'name' => 'Kolaborator Baru',
            'icon' => UploadedFile::fake()->image('logo-kolaborator.png'),
        ];

        $this->actingAs($owner)
            ->put(route('owner.home.update'), $content)
            ->assertRedirect(route('owner.home.edit'));

        $partners = PageContent::query()
            ->where('slug', 'home')
            ->firstOrFail()
            ->content['partners']['items'];
        $this->assertCount(5, $partners);
        $this->assertSame('Kolaborator Baru', $partners[4]['name']);
        $this->assertStringEndsWith('.webp', $partners[0]['icon']);
        $this->assertStringEndsWith('.webp', $partners[4]['icon']);
        Storage::disk('public')->assertMissing($existingLogoPath);
        Storage::disk('public')->assertExists($partners[0]['icon']);
        Storage::disk('public')->assertExists($partners[4]['icon']);
    }

    public function test_owner_can_remove_a_collaborator_logo_without_removing_the_collaborator(): void
    {
        Storage::fake('public');
        $owner = User::factory()->create([
            'role' => 'pemilik',
        ]);
        $existingLogoPath = 'uploads/partners/logo-yang-dihapus.webp';
        $existingContent = config('pages.home');
        $existingContent['partners']['items'][0]['icon'] = $existingLogoPath;
        PageContent::query()->create([
            'slug' => 'home',
            'content' => $existingContent,
        ]);
        Storage::disk('public')->put($existingLogoPath, 'logo lama');

        $content = config('pages.home');
        unset($content['images'], $content['icon_options']);
        foreach ($content['partners']['items'] as &$partner) {
            unset($partner['icon']);
        }
        unset($partner);
        $content['partners']['items'][0]['remove_icon'] = '1';

        $this->actingAs($owner)
            ->get(route('owner.home.edit'))
            ->assertOk()
            ->assertSee('Hapus logo saat ini');

        $this->actingAs($owner)
            ->put(route('owner.home.update'), $content)
            ->assertRedirect(route('owner.home.edit'));

        $partners = PageContent::query()
            ->where('slug', 'home')
            ->firstOrFail()
            ->content['partners']['items'];
        $this->assertCount(4, $partners);
        $this->assertSame('President University', $partners[0]['name']);
        $this->assertSame('', $partners[0]['icon']);
        Storage::disk('public')->assertMissing($existingLogoPath);
    }

    public function test_owner_can_remove_all_homepage_collaborators(): void
    {
        Storage::fake('public');
        $owner = User::factory()->create([
            'role' => 'pemilik',
        ]);
        $existingLogoPath = 'uploads/partners/logo-lama.webp';
        $existingContent = config('pages.home');
        $existingContent['partners']['items'][0]['icon'] = $existingLogoPath;
        PageContent::query()->create([
            'slug' => 'home',
            'content' => $existingContent,
        ]);
        Storage::disk('public')->put($existingLogoPath, 'logo lama');

        $content = config('pages.home');
        unset($content['images'], $content['icon_options']);
        $content['partners']['items'] = [];

        $this->actingAs($owner)
            ->put(route('owner.home.update'), $content)
            ->assertRedirect(route('owner.home.edit'));

        $homeContent = PageContent::query()
            ->where('slug', 'home')
            ->firstOrFail()
            ->content;
        $this->assertSame([], $homeContent['partners']['items']);
        Storage::disk('public')->assertMissing($existingLogoPath);

        $this->get(route('home'))
            ->assertOk()
            ->assertDontSee('President University')
            ->assertDontSee('class="section partners-section"', false);
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
