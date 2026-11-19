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

    public function test_login_page_is_not_available(): void
    {
        $this->get('/login')->assertNotFound();
    }

    public function test_login_submission_is_not_available(): void
    {
        $this->post('/login')->assertNotFound();
    }
}
