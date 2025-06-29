<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@nusantaraflavours.com'],
            [
                'name' => 'Admin Nusantara',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // Regular user
        User::updateOrCreate(
            ['email' => 'chef@nusantaraflavours.com'],
            [
                'name' => 'Chef Indonesia',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'user',
            ]
        );

        // Test user
        User::updateOrCreate(
            ['email' => 'user@test.com'],
            [
                'name' => 'User Test',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'user',
            ]
        );
    }
}