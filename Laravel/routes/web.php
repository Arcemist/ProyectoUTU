<?php

use App\Models\administradores;
use App\Models\arreglos;
use App\Models\documentos_de_las_empresas;
use App\Models\documentos_de_los_trabajadores;
use App\Models\empresas_terciarizadas;
use App\Models\guardias;
use App\Models\solicitudes_de_arreglo;
use App\Models\sucursales;
use App\Models\trabaja_en;
use App\Models\trabajadores_terciarizados;

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'epas' => sucursales::all()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/database', function() {
    return [
        'Sucursales' => sucursales::all(),
        'Administradores' => administradores::all(),
        'Guardias' => guardias::all(),
        'Trabaja_en' => trabaja_en::all(),
        'Empresas Terciarizadas' => empresas_terciarizadas::all(),
        'Documentos de las empresas' => documentos_de_las_empresas::all(),
        'Trabajadores Terciarizados' => trabajadores_terciarizados::all(),
        'Documentos de los trabajadores' => documentos_de_los_trabajadores::all(),
        'Arreglos' => DB::table('arreglos')->select('*')->get(),
        'Solicitudes de arreglo' => DB::table('solicitudes_de_arreglo')->select('*')->get()
    ];
});

Route::get('/intento', function() {
    return Inertia::render('intento', [
        'sucursales' => sucursales::all(),
        'administradores' => administradores::all(),
        'guardias' => guardias::all(),
        'trabaja_en' => trabaja_en::all(),
        'empresas_terciarizadas' => empresas_terciarizadas::all(),
        'documentos_de_las_empresas' => documentos_de_las_empresas::all(),
        'trabajadores_terciarizados' => trabajadores_terciarizados::all(),
        'documentos_de_los_trabajadores' => documentos_de_los_trabajadores::all(),
        'arreglos' => DB::table('arreglos')->select('*')->get(),
        'solicitudes_de_arreglo' => DB::table('solicitudes_de_arreglo')->select('*')->get()
    ]);
})->middleware(['auth', 'verified'])->name('intento');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
