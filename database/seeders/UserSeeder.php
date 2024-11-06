<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ids = [
            User::factory()->create([
                'name' => 'Daniel',
                'email' => 'niverdanielarce@gmail.com',
                'password' => Hash::make('epalapapa'),
                'user_type' => UserType::ADMINISTRADOR->value
            ])->id,

            User::factory()->create([
                'name' => 'Lucas',
                'email' => 'rukasu@gmail.com',
                'password' => Hash::make('arribamilei15'),
                'user_type' => UserType::ADMINISTRADOR->value
            ])->id,

            User::factory()->create([
                'name' => 'Nicolas',
                'email' => 'correo.nico4@gmail.com',
                'password' => Hash::make('putoelqueloescriba'),
                'user_type' => UserType::ADMINISTRADOR->value
            ])->id,

            User::factory()->create([
                'name' => 'Ferretero',
                'email' => 'ferre@gmail.com',
                'password' => Hash::make('ferretero'),
                'user_type' => UserType::EMPRESA->value
            ])->id,

            User::factory()->create([
                'name' => 'Guardian de la Torre',
                'email' => 'ejemplo@gmail.com',
                'password' => Hash::make('epalapapa'),
                'user_type' => UserType::GUARDIA->value
            ])->id
        ];

        $secuencia_tipos_usuario = new Sequence(
            ['user_type' => UserType::GUARDIA->value],
            ['user_type' => UserType::EMPRESA->value]
        );

        $usuarios_genericos = User::factory()
            ->count(rand(20,40))
            ->state($secuencia_tipos_usuario)
            ->create()
            ->all();

        $ids_genericos = [];
        foreach ($usuarios_genericos as $key => $usuario) {
            $ids_genericos[$key] = $usuario->id;
        }

        //
        // HACER QUE SE USE ESTA INFO PA LLAMAR A EL SEEDER DE LOS DOCUMENTOS
        //

        //$this->call();

    }
}
