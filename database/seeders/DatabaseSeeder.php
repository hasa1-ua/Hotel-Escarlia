<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            TiposHabitacionesTableSeeder::class,
            TiposSalasTableSeeder::class,
            RegimenesTableSeeder::class,
            TemporadasTableSeeder::class,
            SalasTableSeeder::class,
            HabitacionesTableSeeder::class,
            FotosTableSeeder::class,
            CuponesTableSeeder::class,
            ReservasTableSeeder::class,
            CuponesReservasTableSeeder::class,
        ]);
    }
}
