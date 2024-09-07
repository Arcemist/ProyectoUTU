<?php

namespace Database\Seeders;

use App\Enums\Estado_solicitud;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

require 'app/Enums/Estado_solicitud.php';

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
            'Estado' => Estado_solicitud::EN_ESPERA,
            'Personal_asignado' => json_encode(['99887766']),
            'Aprobada_por' => null,
        ]);

        DB::table('solicitudes_de_arreglo')->insert([
            'Creada_por' => '223344556677',
            'Solicita_arreglar' => 2,
            'Estado' => Estado_solicitud::RECHAZADA->value,
            'Personal_asignado' => json_encode(['88776655']),
            'Aprobada_por' => 12345678,
        ]);
        DB::table('solicitudes_de_arreglo')->insert([
            'Creada_por' => '334455667788',
            'Solicita_arreglar' => 3,
            'Estado' => Estado_solicitud::ACEPTADA->value,
            'Personal_asignado' => json_encode(['77665544']),
            'Aprobada_por' => 56255419,
        ]);
    }
}
