<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\solicitudes_de_arreglo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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



        User::factory()->make([
            'user_type' => UserType::GUARDIA->value
        ])->count(15);

        $this->call([
            SucursalesSeeder::class,
            GuardiasSeeder::class,
            EmpresasTerciarizadasSeeder::class,
            ArreglosSeeder::class,
        ]);
    }
}
