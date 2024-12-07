<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salas')->delete();

        $salas = [
            ['Sala de Conferencias 1', true, 1],
            ['Sala de Eventos', true, 2],
            ['Sala de Capacitación', true, 3],
        ];

        foreach ($salas as $s) {
            DB::table('salas')->insert([
                'nombre' => $s[0],
                'disponible' => $s[1],
                'tipo_sala_id' => $s[2],
            ]);
        }
    }
}
