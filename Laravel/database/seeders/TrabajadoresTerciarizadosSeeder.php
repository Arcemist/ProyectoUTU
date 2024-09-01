<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrabajadoresTerciarizadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trabajadores_terciarizados')->insert([
            'Cedula' => 99887766,
            'Nombre' => 'Lario',
            'Trabaja_en' => 112233445566,
        ]);
        DB::table('trabajadores_terciarizados')->insert([
            'Cedula' => 88776655,
            'Nombre' => 'Muigi',
            'Trabaja_en' => 223344556677,
        ]);
        DB::table('trabajadores_terciarizados')->insert([
            'Cedula' => 77665544,
            'Nombre' => 'Gus',
            'Trabaja_en' => 334455667788,
        ]);

        DB::table('documentos_de_los_trabajadores')->insert([
            'Pertenece_a' => 99887766,
            'Archivo' => 'ejemplo de documento importante',
        ]);
        DB::table('documentos_de_los_trabajadores')->insert([
            'Pertenece_a' => 88776655,
            'Archivo' => 'ejemplo de documento importante',
        ]);
        DB::table('documentos_de_los_trabajadores')->insert([
            'Pertenece_a' => 77665544,
            'Archivo' => 'ejemplo de documento importante',
        ]);
    }
}
