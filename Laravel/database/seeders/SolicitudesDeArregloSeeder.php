<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolicitudesDeArregloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('solicitudes_de_arreglo')->insert([
            'Creada_por' => '112233445566',
            'Solicita_arreglar' => 1,
            'Estado' => null,
            'Aprobada_por' => null,
        ]);
        DB::table('solicitudes_de_arreglo')->insert([
            'Creada_por' => '223344556677',
            'Solicita_arreglar' => 2,
        ]);
        DB::table('solicitudes_de_arreglo')->insert([
            'Creada_por' => '334455667788',
            'Solicita_arreglar' => 3,
        ]);
    }
}
