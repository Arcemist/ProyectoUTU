<?php

namespace Database\Seeders;

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
            'password' => Hash::make('epalapapa')
        ]);



        // cosas mias:

        $this->call([
            SucursalesSeeder::class,
            AdministradoresSeeder::class,
            GuardiasSeeder::class,
            EmpresasTerciarizadasSeeder::class,
            TrabajadoresTerciarizadosSeeder::class,
            ArreglosSeeder::class,
            SolicitudesDeArregloSeeder::class,
        ]);
    }
}
