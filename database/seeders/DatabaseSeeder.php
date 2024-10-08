<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\solicitudes_de_arreglo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Daniel',
            'email' => 'niverdanielarce@gmail.com',
            'password' => Hash::make('epalapapa'),
            'user_type' => UserType::ADMINISTRADOR->value
        ]);

        User::factory()->create([
            'name' => 'Lucas',
            'email' => 'rukasu@gmail.com',
            'password' => Hash::make('arribamilei15'),
            'user_type' => UserType::ADMINISTRADOR->value
        ]);

        User::factory()->create([
            'name' => 'Nicolas',
            'email' => 'correo.nico4@gmail.com',
            'password' => Hash::make('putoelqueloescriba'),
            'user_type' => UserType::ADMINISTRADOR->value
        ]);

        User::factory(10)->state(new Sequence(
            ['user_type' => UserType::GUARDIA->value],
            ['user_type' => UserType::EMPRESA->value],
        ))->create();

        $this->call([
            SucursalesSeeder::class,
            GuardiasSeeder::class,
            EmpresasTerciarizadasSeeder::class,
            ArreglosSeeder::class,
        ]);
    }
}
