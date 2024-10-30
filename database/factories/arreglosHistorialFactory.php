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
            'Nombre' => fake()->unique()->name(),
            'Descripcion' => Str::random(20),
            'Creado_por' => 1,
            'Empresa_encargada' => 4,
            'Personal_encargado' => implode(',',[fake()->name(),fake()->name()]),
            'Sucursal' => 1,
            'Fecha_realizado' => now()
        ];
    }

    public function Crear_administrador() {
        return $this->state(fn (array $attributes) => [
            'Creado_por' => User::factory()->create(['user_type' => UserType::ADMINISTRADOR->value ])->id()
        ]);
    }

    public function Crear_empresa() {
        return $this->state(fn (array $attributes) => [
            'Empresa_encargada' => User::factory()->create(['user_type' => UserType::EMPRESA->value ])->id()
        ]);
    }

    public function Crear_sucursal() {
        return $this->state(fn (array $attributes) => [
            'Sucursal' => sucursales::factory()->create()->id()
        ]);
    }
}
