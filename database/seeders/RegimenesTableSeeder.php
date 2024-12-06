<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegimenesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regimenes')->delete();

        $regimenes = [
            ['solo_alojamiento', 50.00],
            ['alojamiento_desayuno', 70.00],
            ['media_pension', 90.00],
            ['pension_completa', 120.00],
        ];

        foreach ($regimenes as $r) {
            DB::table('regimenes')->insert([
                'nombre' => $r[0],
                'precio' => $r[1],
            ]);
        }
    }
}
