<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposSalasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_salas')->delete();

        $tipo_salas = [
            ['Solo Sala', 30, 'Sala básica sin servicios adicionales', 50.00],
            ['Con Cátering', 50, 'Sala con servicio de cátering incluido', 70.00],
            ['Con Asistentes', 100, 'Sala con servicio de asistentes para el evento', 90.00],
        ];

        foreach ($tipo_salas as $ts) {
            DB::table('tipo_salas')->insert([
                'nombre' => $ts[0],
                'aforo' => $ts[1],
                'descripcion' => $ts[2],
                'precio' => $ts[3]
            ]);
        }
    }
}
