<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\SolicitudDeRegistro;

use function Symfony\Component\Clock\now;

class SolicitudesDeRegistroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SolicitudDeRegistro::factory()
            ->count(4)
            ->create();
    }
}
