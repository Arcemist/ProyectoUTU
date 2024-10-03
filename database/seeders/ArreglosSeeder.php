<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\Clock\now;

class ArreglosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
        DB::table('arreglos')->insert([
            'Nombre' => 'Arreglar las tolvas',
            'Descripcion' => 'Recalibrar la tolva sur 3',
            'Creado_por' => 56255419,
            'Sucursal' => 'Rivera',
            'Fecha_creacion' => now('now'),
        ]);
        DB::table('arreglos')->insert([
            'Nombre' => 'Renovar las tolvas',
            'Descripcion' => 'Reemplazar las tolvas que hay con tolvas nuevas',
            'Creado_por' => 56255419,
            'Sucursal' => 'Cerro Largo',
            'Fecha_creacion' => now('now'),
        ]);
        DB::table('arreglos')->insert([
            'Nombre' => 'Saldar deudas',
            'Descripcion' => 'Cobrar deudas',
            'Creado_por' => 12345678,
            'Sucursal' => 'Montevideo',
            'Fecha_creacion' => now('now'),
        ]);
        **/
    }
}
