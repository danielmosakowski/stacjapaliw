<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a specific user
        User::factory()->create([
            'name' => 'Test User4',
            'email' => 'test4@example.com',
        ]);

        // Call other seeders
        $this->call([
            BrandsSeeder::class,
            StationsSeeder::class,
            StationFuelTypesSeeder::class,
        ]);
    }
}
