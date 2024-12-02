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
            ['DESCUENTO10', 10.00, '2024-12-31'],
            ['OFERTA20', 20.00, '2024-11-30'],
            ['PROMO30', 30.00, '2024-10-31'],
        ];

        foreach ($cupones as $c) {
            DB::table('cupones')->insert([
                'codigo' => $c[0],
                'descuento' => $c[1],
                'fecha_expiracion' => $c[2],
            ]);
        }
    }
}
