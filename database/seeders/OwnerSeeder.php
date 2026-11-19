<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use RuntimeException;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ownerDetails = config('tbm.owner');
        $name = $ownerDetails['name'] ?? null;
        $email = $ownerDetails['email'] ?? null;
        $password = $ownerDetails['password'] ?? null;

        if (
            ! is_string($name)
            || trim($name) === ''
            || ! is_string($email)
            || filter_var($email, FILTER_VALIDATE_EMAIL) === false
            || ! is_string($password)
            || trim($password) === ''
            || (app()->environment('production') && strlen($password) < 12)
        ) {
            throw new RuntimeException(
                'Set TBM_OWNER_NAME, a valid TBM_OWNER_EMAIL, and a non-empty TBM_OWNER_PASSWORD. Production passwords must have at least 12 characters.'
            );
        }

        $owner = User::firstOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => $password,
                'role' => 'pemilik',
            ]
        );

        if (! $owner->isPemilik()) {
            throw new RuntimeException(
                'The configured owner email is already assigned to an account with a different role.'
            );
        }
    }
}
