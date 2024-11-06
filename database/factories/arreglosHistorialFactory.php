<?php

namespace Database\Factories;

use App\Enums\UserType;
use App\Models\User;
use App\Models\sucursales;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class arreglosHistorialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [ // Nota: el modelo de esto no existe todavia
            'Nombre' => fake()
                ->unique()
                ->name(),
            'Descripcion' => Str::random(20),
            'Creado_por' => User::factory()
                ->create(['user_type' => UserType::ADMINISTRADOR->value])
                ->toJson(),
            'Empresa_encargada' => User::factory()
                ->create(['user_type' => UserType::EMPRESA->value])
                ->toJson(),
            'Personal_encargado' => implode(',',[fake()->name(),fake()->name()]),
            'Sucursal' => sucursales::factory()
                ->create()
                ->toJson(),
            'Fecha_realizado' => now()
        ];
    }
}
