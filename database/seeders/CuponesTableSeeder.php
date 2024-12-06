<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CuponesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cupones')->delete();

        $cupones = [
            ['DESCUENTO10', 10.00, '2024-12-31', null, false],
            ['PROMO50', 50.00, '2024-06-30', 1, false],
            ['BIENVENIDO', 20.00, '2025-01-01', 2, true],
        ];

        foreach ($cupones as $cupon) {
            DB::table('cupones')->insert([
                'codigo' => $cupon[0],
                'descuento' => $cupon[1],
                'fecha_expiracion' => $cupon[2],
                'usuario_id' => $cupon[3],
                'utilizado' => $cupon[4],
            ]);
        }
    }
}
