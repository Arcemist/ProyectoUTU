<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresasTerciarizadasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('empresas_terciarizadas')->insert([
            'RUT' => 112233445566,
            'Nombre' => 'Tolvas y mas',
        ]);
        DB::table('empresas_terciarizadas')->insert([
            'RUT' => 223344556677,
            'Nombre' => 'Arregladores de tolvas',
        ]);
        DB::table('empresas_terciarizadas')->insert([
            'RUT' => 334455667788,
            'Nombre' => 'Los Pollos Hermanos',
        ]);

        DB::table('documentos_de_las_empresas')->insert([
            'Pertenece_a' => 112233445566,
            'Archivo' => 'Ejemplo de documento importante',
        ]);
        DB::table('documentos_de_las_empresas')->insert([
            'Pertenece_a' => 223344556677,
            'Archivo' => 'Ejemplo de documento importante',
        ]);
        DB::table('documentos_de_las_empresas')->insert([
            'Pertenece_a' => 334455667788,
            'Archivo' => 'Ejemplo de documento importante',
        ]);
    }
}
