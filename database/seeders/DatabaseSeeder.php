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
            TemporadasTableSeeder::class,
            SalasTableSeeder::class,
            HabitacionesTableSeeder::class,
            ReservasTableSeeder::class,
            PreciosTableSeeder::class,
            CuponesTableSeeder::class,
            CuponesReservasTableSeeder::class, 
        ]);
    }
}
