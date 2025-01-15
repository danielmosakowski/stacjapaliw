<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuelTypesSeeder extends Seeder
{
    public function run()
    {
        DB::table('fuel_types')->insert([
            ['id' => 1, 'name' => 'Benzyna'],
            ['id' => 2, 'name' => 'Diesel'],
            ['id' => 3, 'name' => 'LPG'],
        ]);
    }
}
