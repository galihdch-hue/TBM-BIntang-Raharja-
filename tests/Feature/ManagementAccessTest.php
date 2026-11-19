<?php

namespace Tests\Feature;

use App\Models\AboutPage;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class ManagementAccessTest extends TestCase
{
    use LazilyRefreshDatabase;

    #[DataProvider('contentManagerRoles')]
    public function test_content_managers_can_edit_about_page(string $role): void
    {
        $user = User::factory()->create([
            'role' => $role,
        ]);
        $content = config('tbm.about');
        $content['hero']['description'] = '<script>alert("x")</script>';

        $this->actingAs($user)
            ->get(route('owner.about.edit'))
            ->assertOk()
            ->assertSee('Edit Halaman Tentang');

        $this->put(route('owner.about.update'), $content)
            ->assertRedirect(route('owner.about.edit'));

        $this->assertSame(
            '<script>alert("x")</script>',
            AboutPage::query()->findOrFail(1)->content['hero']['description'],
        );

        $this->get(route('about'))
            ->assertOk()
            ->assertSee('<script>alert("x")</script>')
            ->assertDontSee('<script>alert("x")</script>', false);
    }

    public static function contentManagerRoles(): array
    {
        return [
            'pemilik' => ['pemilik'],
            'pengurus' => ['pengurus'],
        ];
    }

    public function test_pengurus_can_manage_content(): void
    {
        $pengurus = User::factory()->create([
            'role' => 'pengurus',
        ]);

        $this->actingAs($pengurus)
            ->post(route('owner.activities.store'), [
                'title' => 'Kelas Literasi Pengurus',
                'category' => 'Literasi',
                'description' => 'Kegiatan yang dikelola oleh pengurus.',
                'date' => '2026-12-10',
                'start_time' => '09:00',
                'end_time' => '11:00',
                'is_active' => '1',
            ])
            ->assertRedirect(route('owner.activities.index'));

        $this->get(route('owner.news.index'))->assertOk();
        $this->get(route('owner.gallery.index'))->assertOk();

        $this->assertDatabaseHas('activities', [
            'title' => 'Kelas Literasi Pengurus',
        ]);
    }

    public function test_pengurus_cannot_open_pengurus_account_management(): void
    {
        $pengurus = User::factory()->create([
            'role' => 'pengurus',
        ]);

        $this->actingAs($pengurus)
            ->get(route('owner.pengurus.index'))
            ->assertForbidden();
    }

    public function test_pemilik_can_create_update_and_delete_pengurus_without_changing_role(): void
    {
        $owner = User::factory()->create([
            'role' => 'pemilik',
        ]);

        $this->actingAs($owner)
            ->get(route('owner.pengurus.index'))
            ->assertOk();

        $this->get(route('owner.pengurus.create'))
            ->assertOk()
            ->assertSee('Role akun dikunci sebagai Pengurus');

        $this->actingAs($owner)
            ->post(route('owner.pengurus.store'), [
                'name' => 'Pengurus Baru',
                'email' => 'pengurus@example.test',
                'password' => 'secure-password',
                'password_confirmation' => 'secure-password',
                'role' => 'pemilik',
            ])
            ->assertRedirect(route('owner.pengurus.index'));

        $pengurus = User::query()->where('email', 'pengurus@example.test')->firstOrFail();
        $this->assertSame('pengurus', $pengurus->role);

        $this->put(route('owner.pengurus.update', $pengurus), [
            'name' => 'Pengurus Diperbarui',
            'email' => 'pengurus@example.test',
            'role' => 'pemilik',
        ])->assertRedirect(route('owner.pengurus.index'));

        $pengurus->refresh();
        $this->assertSame('Pengurus Diperbarui', $pengurus->name);
        $this->assertSame('pengurus', $pengurus->role);

        $this->delete(route('owner.pengurus.destroy', $pengurus))
            ->assertRedirect(route('owner.pengurus.index'));

        $this->assertDatabaseMissing('users', [
            'id' => $pengurus->id,
        ]);
        $this->assertModelExists($owner);
    }

    public function test_pemilik_cannot_edit_or_delete_an_account_that_is_not_pengurus(): void
    {
        $owner = User::factory()->create([
            'role' => 'pemilik',
        ]);
        $otherOwner = User::factory()->create([
            'role' => 'pemilik',
        ]);

        $this->actingAs($owner)
            ->get(route('owner.pengurus.edit', $otherOwner))
            ->assertNotFound();

        $this->delete(route('owner.pengurus.destroy', $otherOwner))
            ->assertNotFound();

        $this->assertModelExists($otherOwner);
    }
}
