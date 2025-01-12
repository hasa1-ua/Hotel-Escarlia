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
            ['foto3.jpg', 2, null],
            ['foto4.jpg', 2, null],
            ['foto5.jpg', null, 1],
            ['foto6.jpg', null, 1],
            ['foto7.jpg', null, 2],
            ['foto8.jpg', null, 2],
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
