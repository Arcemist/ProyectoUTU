<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SucursalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sucursales')->insert(['Nombre' => 'Cerro Largo']);
        DB::table('sucursales')->insert(['Nombre' => 'Rivera']);
        DB::table('sucursales')->insert(['Nombre' => 'Montevideo']);
    }
}
