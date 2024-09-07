<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministradoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('administradores')->insert([
            'Cedula' => 56255419,
            'Nombre' => 'Niver Daniel Arce Rosas',
        ]);
        DB::table('administradores')->insert([
            'Cedula' => 12345678,
            'Nombre' => 'Juan Alvez',
        ]);
    }
}
