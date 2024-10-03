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
        /**
        DB::table('guardias')->insert([
            'Cedula' => 11223344,
            'Nombre' => 'Paladin',
            'Trabaja_en' => json_encode(['Cerro Largo'])
        ]);
        DB::table('guardias')->insert([
            'Cedula' => 22334455,
            'Nombre' => 'Guerrero',
            'Trabaja_en' => json_encode(['Montevideo'])
        ]);
        DB::table('guardias')->insert([
            'Cedula' => 33445566,
            'Nombre' => 'Mago',
            'Trabaja_en' => json_encode(['Rivera'])
        ]);
        **/
    }
}
