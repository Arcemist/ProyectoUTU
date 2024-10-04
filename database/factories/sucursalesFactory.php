<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\sucursales>
 */
class sucursalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [ 'Nombre' => fake()->unique()->name() ];
    }
}

// esto dudo usarlo pero lo dejo porque sirve de ejemplo
