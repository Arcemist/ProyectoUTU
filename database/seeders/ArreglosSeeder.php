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
            ->count(10)
            ->create();

        $id_administrador = User::factory()
            ->create(['user_type' => UserType::ADMINISTRADOR->value])
            ->id();
        arreglos::factory()
            ->count(10)
            ->create(['Creado_por' => $id_administrador]);

        $id_empresa = User::factory()
            ->create(['user_type' => UserType::EMPRESA->value])
            ->id();
        arreglos::factory()
            ->count(10)
            ->create(['Empresa_encargada' => $id_empresa]);

        $id_sucursal = sucursales::factory()
            ->create(['Nombre' => 'Rivera'])
            ->id();
        arreglos::factory()
            ->count(10)
            ->create(['Sucursal' => $id_sucursal]);

        arreglosHistorial::factory()
            ->Crear_administrador()
            ->Crear_empresa()
            ->Crear_sucursal()
            ->count(10)
            ->create();

        $id_administrador_historial = User::factory()
            ->create(['user_type' => UserType::ADMINISTRADOR->value])
            ->id();
        arreglosHistorial::factory()
            ->count(10)
            ->create(['Creado_por' => $id_administrador_historial]);

        $id_empresa_historial = User::factory()
            ->create(['user_type' => UserType::EMPRESA->value])
            ->id();
        arreglosHistorial::factory()
            ->count(10)
            ->create(['Empresa_encargada' => $id_empresa_historial]);

        $id_sucursal_historial = sucursales::factory()
            ->create(['Nombre' => 'Montevideo'])
            ->id();
        arreglosHistorial::factory()
            ->count(10)
            ->create(['Sucursal' => $id_sucursal_historial]);

    }
}
