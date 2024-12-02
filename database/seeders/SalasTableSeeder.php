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
            ['Sala de Conferencias 1', 50, 'Ideal para reuniones corporativas', true, 1],
            ['Sala de Eventos', 100, 'Perfecta para bodas y eventos grandes', true, 2],
            ['Sala de Capacitación', 30, 'Diseñada para formaciones y talleres', true, 3],
        ];

        foreach ($salas as $s) {
            DB::table('salas')->insert([
                'nombre' => $s[0],
                'aforo' => $s[1],
                'descripcion' => $s[2],
                'disponible' => $s[3],
                'tipo_sala_id' => $s[4],
            ]);
        }
    }
}
