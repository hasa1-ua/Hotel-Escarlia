<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemporadasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('temporadas')->delete();

        $temporadas = [
            ['Alta', '2024-06-01', '2024-08-31'],
            ['Media', '2024-04-01', '2024-05-31'],
            ['Baja', '2024-09-01', '2024-12-31'],
        ];

        foreach ($temporadas as $t) {
            DB::table('temporadas')->insert([
                'nombre' => $t[0],
                'fecha_inicio' => $t[1],
                'fecha_fin' => $t[2],
            ]);
        }
    }
}
