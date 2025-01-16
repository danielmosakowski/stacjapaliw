<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationFuelTypesSeeder extends Seeder
{
    public function run()
    {
        // Pobieramy wszystkie stacje i wszystkie typy paliw
        $stations = DB::table('stations')->get();
        $fuelTypes = DB::table('fuel_types')->pluck('id'); // Pobiera tylko ID typów paliw

        // Tworzymy dane do wstawienia
        $stationFuelData = [];
        foreach ($stations as $station) {
            foreach ($fuelTypes as $fuelTypeId) {
                $stationFuelData[] = [
                    'station_id' => $station->id,
                    'fuel_type_id' => $fuelTypeId,
                ];
            }
        }

        // Wstawiamy dane do tabeli `station_fuel_types`
        DB::table('station_fuel_types')->insert($stationFuelData);
    }
}
