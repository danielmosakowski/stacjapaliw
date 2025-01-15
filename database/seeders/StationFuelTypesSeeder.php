<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationFuelTypesSeeder extends Seeder
{
    public function run()
    {
        DB::table('station_fuel_types')->insert([
            ['station_id' => 1, 'fuel_type_id' => 1], // Orlen - Benzyna
            ['station_id' => 2, 'fuel_type_id' => 2], // Shell - Diesel
            ['station_id' => 3, 'fuel_type_id' => 1], // Orlen - Benzyna
            ['station_id' => 4, 'fuel_type_id' => 2], // MOL - Diesel
            ['station_id' => 5, 'fuel_type_id' => 3], // Auchan - LPG
            // Możesz dodać więcej stacji i przypisanych typów paliw
        ]);
    }
}
