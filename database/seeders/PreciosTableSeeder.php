<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('precios')->delete();

        $precios = [
            [1, null, 1, 100.00],
            [2, null, 1, 150.00],
            [null, 1, 2, 200.00],
            [null, 2, 2, 250.00],
        ];

        foreach ($precios as $p) {
            DB::table('precios')->insert([
                'tipo_habitacion_id' => $p[0],
                'tipo_sala_id' => $p[1],
                'temporada_id' => $p[2],
                'precio' => $p[3],
            ]);
        }
    }
}
