<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposHabitacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_habitaciones')->delete();

        $tipos_habitaciones = [
            ['Individual', 'Habitación para una persona', 1, json_encode(['WiFi', 'TV']), 30.00, "imagenes/TiposHabitaciones/individual.jpg"],
            ['Doble', 'Habitación para dos personas', 2, json_encode(['WiFi', 'TV', 'MiniBar']), 50.00, "imagenes/TiposHabitaciones/doble.jpg"],
            ['Suite', 'Habitación de lujo para cuatro personas', 4, json_encode(['WiFi', 'TV', 'MiniBar', 'Jacuzzi']), 70.00, "imagenes/TiposHabitaciones/suite.jpg"],
        ];

        foreach ($tipos_habitaciones as $th) {
            DB::table('tipos_habitaciones')->insert([
                'nombre' => $th[0],
                'descripcion' => $th[1],
                'plazas' => $th[2],
                'características' => $th[3],
                'precio' => $th[4],
                'img' => $th[5],
            ]);
        }
    }
}
