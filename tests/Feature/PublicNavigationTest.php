<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class PublicNavigationTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_public_navigation_does_not_show_a_login_link(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertDontSee('Masuk');
    }

    public function test_login_page_displays_the_owner_sign_in_form(): void
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('Masuk ke Area Pengelola')
            ->assertSee(route('login.authenticate'), false);
    }

    public function test_login_submission_redirects_with_required_credential_errors(): void
    {
        $this->from(route('login'))
            ->post(route('login.authenticate'), [])
            ->assertRedirect(route('login'))
            ->assertSessionHasErrors(['email', 'password']);
    }
}
