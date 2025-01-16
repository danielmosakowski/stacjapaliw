<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsSeeder extends Seeder
{
    public function run()
    {
        DB::table('brands')->insert([
            ['id' => 1, 'name' => 'Orlen'],
            ['id' => 2, 'name' => 'Shell'],
            ['id' => 3, 'name' => 'MOL'],
            ['id' => 4, 'name' => 'Auchan'],
            ['id' => 5, 'name' => 'Circle K'],
            ['id' => 6, 'name' => 'AMIC'],
            ['id' => 7, 'name' => 'BP'],
            ['id' => 8, 'name' => 'Merkury'],
            ['id' => 9, 'name' => 'LOTOS'],
        ]);
    }
}
