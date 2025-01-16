<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StationsSeeder extends Seeder
{
    public function run()
    {
        //Dane z tabeli brands
        $brands = [
            'Orlen' => 1,
            'Shell' => 2,
            'MOL' => 3,
            'Auchan' => 4,
            'Circle K' => 5,
            'AMIC' => 6,
            'BP' => 7,
            'Merkury' => 8,
            'LOTOS' => 9,
        ];

        DB::table('stations')->insert([
            [
                'id' => 1,
                'brand_id' => $brands['Orlen'],
                'name' => 'Orlen',
                'address' => 'Chojnowska 154, Legnica',
                'latitude' => 51.2094,
                'longitude' => 16.1309,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'brand_id' => $brands['Shell'],
                'name' => 'Shell',
                'address' => 'Złotoryjska 172, Legnica',
                'latitude' => 51.1917,
                'longitude' => 16.1276,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'brand_id' => $brands['Orlen'],
                'name' => 'Orlen',
                'address' => 'Jaworzyńska 238, Legnica',
                'latitude' => 51.1777,
                'longitude' => 16.1581,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'brand_id' => $brands['MOL'],
                'name' => 'MOL',
                'address' => 'Nowodworska 30A, Legnica',
                'latitude' => 51.1784,
                'longitude' => 16.1567,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'brand_id' => $brands['Auchan'],
                'name' => 'Auchan',
                'address' => 'Roberta Schumana 11, Legnica',
                'latitude' => 51.1841,
                'longitude' => 16.1685,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'brand_id' => $brands['Circle K'],
                'name' => 'Circle K',
                'address' => 'Gwarna Muzealna, Legnica',
                'latitude' => 51.2049,
                'longitude' => 16.1581,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'brand_id' => $brands['Orlen'],
                'name' => 'Orlen',
                'address' => 'Władysława Łokietka 9, Legnica',
                'latitude' => 51.2141,
                'longitude' => 16.1631,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'brand_id' => $brands['AMIC'],
                'name' => 'AMIC',
                'address' => 'Pocztowa 2, Legnica',
                'latitude' => 51.2121,
                'longitude' => 16.1672,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'brand_id' => $brands['Orlen'],
                'name' => 'Orlen',
                'address' => 'Gwiezdna 10, Legnica',
                'latitude' => 51.2069,
                'longitude' => 16.1816,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 10,
                'brand_id' => $brands['BP'],
                'name' => 'BP',
                'address' => 'Wrocławska 151, Legnica',
                'latitude' => 51.2094,
                'longitude' => 16.1861,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 11,
                'brand_id' => $brands['Shell'],
                'name' => 'Shell',
                'address' => 'aleja Piłsudskiego 11, Legnica',
                'latitude' => 51.2043,
                'longitude' => 16.1917,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 12,
                'brand_id' => $brands['Orlen'],
                'name' => 'Orlen',
                'address' => 'Spokojna 59, Legnica',
                'latitude' => 51.2108,
                'longitude' => 16.2014,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 13,
                'brand_id' => $brands['Merkury'],
                'name' => 'Merkury',
                'address' => 'Słubicka 4a, Legnica',
                'latitude' => 51.2175,
                'longitude' => 16.1581,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 14,
                'brand_id' => $brands['LOTOS'],
                'name' => 'LOTOS',
                'address' => 'Poznańska 44, Legnica',
                'latitude' => 51.2276,
                'longitude' => 16.1642,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
