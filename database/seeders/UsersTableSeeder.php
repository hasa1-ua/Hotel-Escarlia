<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $usuarios = [
            ['Juan', 'juanperez@gmail.com', '1234', 'Webmaster'],
            ['María', 'marialopez@gmail.com', '1234', 'Recepción'],
            ['Pablo', 'pablorodriguez@gmail.com', 'pablo', 'Cliente'],
            ['Laura', 'laurafernandez@gmail.com', 'laura', 'Cliente'],
            ['Antonio', 'antoniomartinez@gmail.com', 'antonio', 'Cliente'],
        ];

        foreach ($usuarios as $u) {
            DB::table('users')->insert([
                'nombre_usuario' => $u[0],
                'email' => $u[1],
                'password' => Hash::make($u[2]),
                'rol' => $u[3],
            ]);
        }
    }
}
