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
        DB::table('tipos_salas')->delete();

        $tipos_salas = [
            ['Solo Sala', 'Sala básica sin servicios adicionales'],
            ['Con Cátering', 'Sala con servicio de cátering incluido'],
            ['Con Asistentes', 'Sala con servicio de asistentes para el evento'],
        ];

        foreach ($tipos_salas as $ts) {
            DB::table('tipos_salas')->insert([
                'nombre' => $ts[0],
                'descripcion' => $ts[1],
            ]);
        }
    }
}
