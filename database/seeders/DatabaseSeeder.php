<?php

namespace Database\Seeders;

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan seeder secara terpisah
        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
            RecipeSeeder::class,
        ]);

        $this->command->info('Database seeded successfully!');
    }
}