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
            ['imagenes/Salas/sala-multiusos-multipurpose-room-hotel-tossal-daltea-inicio-home-4.jpg', 1, null],
            ['imagenes/Salas/zero-bodas-1.jpg', 1, null],
            ['imagenes/Salas/sala-multiusos-multipurpose-room-hotel-tossal-daltea-inicio-home-4.jpg', 2, null],
            ['imagenes/Salas/zero-bodas-1.jpg', 2, null],
            ['imagenes/Salas/sala-multiusos-multipurpose-room-hotel-tossal-daltea-inicio-home-4.jpg', 3, null],
            ['imagenes/Salas/zero-bodas-1.jpg', 3, null],
            ['imagenes/Salas/sala-multiusos-multipurpose-room-hotel-tossal-daltea-inicio-home-4.jpg', 4, null],
            ['imagenes/Salas/zero-bodas-1.jpg', 4, null],
            ['imagenes/Salas/sala-multiusos-multipurpose-room-hotel-tossal-daltea-inicio-home-4.jpg', 5, null],
            ['imagenes/Salas/zero-bodas-1.jpg', 5, null],
            ['imagenes/Salas/sala-multiusos-multipurpose-room-hotel-tossal-daltea-inicio-home-4.jpg', 6, null],
            ['imagenes/Salas/zero-bodas-1.jpg', 6, null],
            ['imagenes/Habitaciones/1-Hostal-Abadia-Habitacion-Individual-Cama.jpg', null, 1],
            ['imagenes/Habitaciones/3-Hostal-Abadia-Habitacion-Individual-Bano.jpg', null, 1],
            ['imagenes/Habitaciones/1-Hostal-Abadia-Habitacion-Individual-Cama.jpg', null, 2],
            ['imagenes/Habitaciones/3-Hostal-Abadia-Habitacion-Individual-Bano.jpg', null, 2],
            ['imagenes/Habitaciones/1-Hostal-Abadia-Habitacion-Individual-Cama.jpg', null, 3],
            ['imagenes/Habitaciones/3-Hostal-Abadia-Habitacion-Individual-Bano.jpg', null, 3],
            ['imagenes/Habitaciones/1-Hostal-Abadia-Habitacion-Individual-Cama.jpg', null, 4],
            ['imagenes/Habitaciones/3-Hostal-Abadia-Habitacion-Individual-Bano.jpg', null, 4],
            ['imagenes/Habitaciones/1-Hostal-Abadia-Habitacion-Individual-Cama.jpg', null, 5],
            ['imagenes/Habitaciones/3-Hostal-Abadia-Habitacion-Individual-Bano.jpg', null, 5],
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
