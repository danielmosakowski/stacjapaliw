<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationPricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pobranie wszystkich relacji stacji i typów paliw
        $stationFuelTypes = DB::table('station_fuel_types')->get();

        foreach ($stationFuelTypes as $relation) {
            DB::table('station_prices')->insert([
                'station_id' => $relation->station_id,
                'station_fuel_type_id' => $relation->id, // Prawidłowe ID powiązania
                'price' => 5.00, // Możesz zmieniać ceny na inne
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
