<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class ContactPageTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_contact_page_shows_new_contacts_and_direct_links(): void
    {
        $this->get('/kontak')
            ->assertOk()
            ->assertSee('Merlyn Sumardiyani')
            ->assertSee('Sekretaris 2')
            ->assertSee('merlynsumardiyani47@gmail.com')
            ->assertSee('https://wa.me/62895360679144')
            ->assertSee('Ashila Nur Fatihah')
            ->assertSee('Bendahara 2')
            ->assertSee('ashilanurfatihah@gmail.com')
            ->assertSee('https://wa.me/6281318356692');
    }

    public function test_contact_profile_photos_have_clickable_lightbox_triggers(): void
    {
        $this->get('/kontak')
            ->assertOk()
            ->assertSee('id="profile-lightbox"', false)
            ->assertSee('aria-label="Lihat foto profil Ibu Murni Setianingsih, S.Pd."', false)
            ->assertSee('aria-label="Lihat foto profil Galih Dwi Chandra"', false)
            ->assertSee('aria-label="Lihat foto profil Merlyn Sumardiyani"', false);
    }
}
