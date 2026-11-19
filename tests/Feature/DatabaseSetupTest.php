<?php

namespace Tests\Feature;

use App\Models\Activity;
use App\Models\Gallery;
use App\Models\News;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\OwnerSeeder;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use RuntimeException;
use Tests\TestCase;

class DatabaseSetupTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_public_content_seeders_do_not_create_duplicates(): void
    {
        app(DatabaseSeeder::class)->run();

        $countsAfterFirstRun = [
            Activity::query()->count(),
            News::query()->count(),
            Gallery::query()->count(),
        ];

        app(DatabaseSeeder::class)->run();

        $this->assertSame($countsAfterFirstRun, [
            Activity::query()->count(),
            News::query()->count(),
            Gallery::query()->count(),
        ]);
    }

    public function test_owner_seeder_creates_a_pemilik_account_once(): void
    {
        config()->set('tbm.owner', [
            'name' => 'Pemilik TBM',
            'email' => 'owner@example.test',
            'password' => 'secure-owner-password',
        ]);

        app(OwnerSeeder::class)->run();
        app(OwnerSeeder::class)->run();

        $this->assertDatabaseHas('users', [
            'email' => 'owner@example.test',
            'role' => 'pemilik',
        ]);
        $this->assertDatabaseCount('users', 1);
    }

    public function test_owner_seeder_does_not_promote_an_existing_non_owner(): void
    {
        User::factory()->create([
            'email' => 'owner@example.test',
            'role' => 'peserta',
        ]);

        config()->set('tbm.owner', [
            'name' => 'Pemilik TBM',
            'email' => 'owner@example.test',
            'password' => 'secure-owner-password',
        ]);

        $this->expectException(RuntimeException::class);

        app(OwnerSeeder::class)->run();
    }
}
