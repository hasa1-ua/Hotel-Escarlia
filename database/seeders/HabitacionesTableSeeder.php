<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HabitacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('habitaciones')->delete();

        $habitaciones = [
            [1, 101, 1, 'Vista al jardín', true],
            [1, 102, 1, 'Vista al patio', true],
            [2, 201, 2, 'Vista al mar', true],
            [2, 202, 2, 'Vista al mar 2', true],
            [2, 203, 2, 'Vista al mar 3', true],
            [3, 301, 3, 'Vista panorámica', true],
            [3, 302, 3, 'Vista a la montaña', false],
        ];

        foreach ($habitaciones as $h) {
            DB::table('habitaciones')->insert([
                'tipo_id' => $h[0],
                'numero' => $h[1],
                'planta' => $h[2],
                'vistas' => $h[3],
                'disponible' => $h[4],
            ]);
        }
    }
}
