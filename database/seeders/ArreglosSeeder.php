<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\sucursales;
use App\Models\User;
use App\Models\arreglos;
use App\Models\arreglosHistorial;

use function Symfony\Component\Clock\now;

class ArreglosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        arreglos::factory()
            ->Crear_administrador()
            ->Crear_empresa()
            ->Crear_sucursal()
            ->count(rand(5,15))
            ->create();

        arreglos::factory()
            ->Crear_administrador()
            ->count(rand(5,15))
            ->create();

        arreglos::factory()
            ->Crear_empresa()
            ->count(rand(5,15))
            ->create();

        arreglos::factory()
            ->Crear_sucursal()
            ->count(rand(5,15))
            ->create();

        arreglosHistorial::factory()
            ->Crear_administrador()
            ->Crear_empresa()
            ->Crear_sucursal()
            ->count(rand(5,15))
            ->create();

        arreglosHistorial::factory()
            ->Crear_administrador()
            ->count(rand(5,15))
            ->create();

        arreglosHistorial::factory()
            ->Crear_empresa()
            ->count(rand(5,15))
            ->create();

        arreglosHistorial::factory()
            ->Crear_sucursal()
            ->count(rand(5,15))
            ->create();

    }
}
