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
class notificacionesGuardiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nombre' => fake()->unique()->name(),
            'Descripcion' => Str::random(20),
            'Pertenece_a' => 1,
            'Ruta' => 'Dashboard'
        ];
    }

    public function Crear_administrador() {
        return $this->state(fn (array $attributes) => [
            'Pertence_a' => User::factory()->create(['user_type' => UserType::ADMINISTRADOR->value ])->id
        ]);
    }

    public function Crear_empresa() {
        return $this->state(fn (array $attributes) => [
            'Pertenece_a' => User::factory()->create(['user_type' => UserType::EMPRESA->value ])->id
        ]);
    }

    public function Crear_guardia() {
        return $this->state(fn (array $attributes) => [
            'Pertenece_a' => User::factory()->create(['user_type' => UserType::GUARDIA->value ])->id
        ]);
    }
}

