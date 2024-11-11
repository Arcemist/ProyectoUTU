<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\sucursales;

class SucursalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        sucursales::factory()->create(['Nombre' => 'Melo']); //sucursal base de ejemplo

        sucursales::factory(rand(5,20))->create();
    }
}
