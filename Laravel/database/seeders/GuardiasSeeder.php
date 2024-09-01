<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuardiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('guardias')->insert([
            'Cedula' => 11223344,
            'Nombre' => 'Paladin',
        ]);
        DB::table('guardias')->insert([
            'Cedula' => 22334455,
            'Nombre' => 'Guerrero',
        ]);
        DB::table('guardias')->insert([
            'Cedula' => 33445566,
            'Nombre' => 'Mago',
        ]);

        DB::table('trabaja_en')->insert([
            'Cedula_guardia' => 11223344,
            'Nombre_sucursal' => 'Cerro largo',
        ]);
        DB::table('trabaja_en')->insert([
            'Cedula_guardia' => 22334455,
            'Nombre_sucursal' => 'Montevideo',
        ]);
        DB::table('trabaja_en')->insert([
            'Cedula_guardia' => 33445566,
            'Nombre_sucursal' => 'Rivera',
        ]);
    }
}
