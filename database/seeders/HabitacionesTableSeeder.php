<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HabitacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('habitaciones')->delete();

        $habitaciones = [
            [1, 101, 1, 'Habitación estándar con vista al jardín y cama individual.', true],
            [1, 102, 1, 'Habitación estándar con vista al patio, cama individual y escritorio.', true],
            [2, 201, 2, 'Habitación premium con vista al mar, balcón y cama doble.', true],
            [2, 202, 2, 'Habitación premium con vista al mar, cama doble y decoración moderna.', true],
            [2, 203, 2, 'Habitación premium con vista al mar, cama doble, escritorio y minibar.', true],
            [3, 301, 3, 'Suite de lujo con vista panorámica, sala de estar y jacuzzi privado.', true],
            [3, 302, 3, 'Suite de lujo con vista a la montaña, chimenea y cama king size.', false],
        ];

        foreach ($habitaciones as $h) {
            DB::table('habitaciones')->insert([
                'tipo_id' => $h[0],
                'numero' => $h[1],
                'planta' => $h[2],
                'vistas' => $h[3],
                'disponible' => $h[4],
            ]);
        }
    }
}
