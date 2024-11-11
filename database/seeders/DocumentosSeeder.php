<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\documentos;
use App\Models\User;
use Database\Factories\documentosFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($id=1, $cantidad=1)
    {
        documentos::factory()
            ->count($cantidad)
            ->create(['Subido_por' => $id]);
    }
}
