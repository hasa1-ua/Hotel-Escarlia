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
            // usuario_id, habitacion_id, sala_id, cupon_id, regimen_id, temporada_id, fecha_inicio, fecha_fin, estado, precio_total
            [1, 1, null, 1, 1, 1, '2024-07-01', '2024-07-07', 'Confirmada', 600.00],
            [2, null, 1, null, 2, 1, '2024-06-15', '2024-06-20', 'Pendiente', 2000.00],
            [1, 2, null, 2, 3, 2, '2024-08-01', '2024-08-10', 'Cancelada', 1200.00],
            [3, 3, null, null, 1, 3, '2024-12-01', '2024-12-05', 'Confirmada', 1800.00],
            [4, null, 3, 3, 4, 1, '2024-05-01', '2024-05-03', 'Pendiente', 900.00],
        ];

        foreach ($reservas as $r) {
            DB::table('reservas')->insert([
                'usuario_id' => $r[0],
                'habitacion_id' => $r[1],
                'sala_id' => $r[2],
                'cupon_id' => $r[3],
                'regimen_id' => $r[4],
                'temporada_id' => $r[5],
                'fecha_inicio' => $r[6],
                'fecha_fin' => $r[7],
                'estado' => $r[8],
                'precio_total' => $r[9],
            ]);
        }
    }
}
