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
        
        // Call seeders
        $this->call([
            FuelTypesSeeder::class,
            BrandsSeeder::class,
            StationsSeeder::class,
            StationFuelTypesSeeder::class,
        ]);
    }
}
