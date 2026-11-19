<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class LoginPageTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_contact_page_links_to_the_login_page(): void
    {
        $this->get('/kontak')
            ->assertOk()
            ->assertSee(route('login'))
            ->assertSeeInOrder([
                'Mari belajar dan berkembang bersama.',
                'Lihat Kegiatan',
                'Masuk',
            ]);
    }

    public function test_login_page_displays_the_login_form(): void
    {
        $this->get('/login')
            ->assertOk()
            ->assertSee('Masuk ke Area Pengelola')
            ->assertSee('name="email"', false)
            ->assertSee('name="password"', false);
    }

    public function test_pemilik_credentials_authenticate_and_redirect_to_management(): void
    {
        $user = User::factory()->create([
            'role' => 'pemilik',
            'password' => 'secret-password',
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret-password',
        ]);

        $response->assertRedirect(route('owner.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_pengurus_credentials_authenticate_and_redirect_to_management(): void
    {
        $user = User::factory()->create([
            'role' => 'pengurus',
            'password' => 'secret-password',
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret-password',
        ]);

        $response->assertRedirect(route('owner.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_invalid_credentials_return_to_login_with_an_error(): void
    {
        $user = User::factory()->create([
            'role' => 'admin',
            'password' => 'secret-password',
        ]);

        $this->from('/login')
            ->post('/login', [
                'email' => $user->email,
                'password' => 'wrong-password',
            ])
            ->assertRedirect('/login')
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    #[DataProvider('nonOwnerRoles')]
    public function test_legacy_roles_cannot_login_to_management(string $role): void
    {
        $user = User::factory()->create([
            'role' => $role,
            'password' => 'secret-password',
        ]);

        $this->from('/login')
            ->post('/login', [
                'email' => $user->email,
                'password' => 'secret-password',
            ])
            ->assertRedirect('/login')
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public static function nonOwnerRoles(): array
    {
        return [
            'admin' => ['admin'],
            'pengajar' => ['pengajar'],
            'peserta' => ['peserta'],
        ];
    }
}
