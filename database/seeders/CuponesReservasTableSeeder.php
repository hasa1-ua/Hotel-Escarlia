<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CuponesReservasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cupon_reserva')->delete();

        $cuponReserva = [
            [1, 1], // Cupon ID 1 asociado a Reserva ID 1
            [2, 2], // Cupon ID 2 asociado a Reserva ID 2
            [3, 1], // Cupon ID 3 asociado a Reserva ID 1
        ];

        foreach ($cuponReserva as $cr) {
            DB::table('cupon_reserva')->insert([
                'cupon_id' => $cr[0],
                'reserva_id' => $cr[1],
            ]);
        }
    }
}
