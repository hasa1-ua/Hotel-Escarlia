<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservas')->delete();

        $reservas = [
            [1, 1, null, '2024-07-01', '2024-07-07', 'Confirmada', 600.00],
            [2, null, 1, '2024-06-15', '2024-06-20', 'Pendiente', 2000.00],
        ];

        foreach ($reservas as $r) {
            DB::table('reservas')->insert([
                'usuario_id' => $r[0],
                'habitacion_id' => $r[1],
                'sala_id' => $r[2],
                'fecha_inicio' => $r[3],
                'fecha_fin' => $r[4],
                'estado' => $r[5],
                'precio_total' => $r[6],
            ]);
        }
    }
}
