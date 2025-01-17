<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fotos')->delete();

        $fotos = [
            ['imagenes/Salas/Salaid1-1.jpg', 1, null],
            ['imagenes/Salas/Salaid1-2.jpg', 1, null],
            ['imagenes/Salas/Salaid1-3.jpg', 2, null],
            ['imagenes/Salas/Salaid1-4.jpg', 2, null],
            ['imagenes/Salas/Salaid2-1.jpg', 3, null],
            ['imagenes/Salas/Salaid2-2.jpg', 3, null],
            ['imagenes/Salas/Salaid2-3.jpg', 4, null],
            ['imagenes/Salas/Salaid2-4.jpg', 4, null],
            ['imagenes/Salas/Salaid3-1.jpg', 5, null],
            ['imagenes/Salas/Salaid3-2.jpg', 5, null],
            ['imagenes/Salas/Salaid3-3.jpg', 6, null],
            ['imagenes/Salas/Salaid3-4.jpg', 6, null],
            ['imagenes/Habitaciones/habitacionid1-1.jpg', null, 1],
            ['imagenes/Habitaciones/habitacionid1-2.jpg', null, 1],
            ['imagenes/Habitaciones/habitacionid1-3.jpg', null, 2],
            ['imagenes/Habitaciones/habitacionid1-4.jpg', null, 2],
            ['imagenes/Habitaciones/habitacionid2-1.jpg', null, 3],
            ['imagenes/Habitaciones/habitacionid2-2.jpg', null, 3],
            ['imagenes/Habitaciones/habitacionid2-3.jpg', null, 4],
            ['imagenes/Habitaciones/habitacionid2-4.jpg', null, 4],
            ['imagenes/Habitaciones/habitacionid2-5.jpg', null, 5],
            ['imagenes/Habitaciones/habitacionid2-6.jpg', null, 5],
            ['imagenes/Habitaciones/habitacionid3-1.jpg', null, 6],
            ['imagenes/Habitaciones/habitacionid3-2.jpg', null, 6],
            ['imagenes/Habitaciones/habitacionid3-3.jpg', null, 7],
            ['imagenes/Habitaciones/habitacionid3-4.jpg', null, 7],
        ];

        foreach ($fotos as $f) {
            DB::table('fotos')->insert([
                'url' => $f[0],
                'sala_id' => $f[1],
                'habitacion_id' => $f[2],
            ]);
        }
    }
}
