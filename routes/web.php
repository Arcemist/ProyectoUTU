<?php

use App\Http\Controllers\SucursalesController;
use App\Http\Middleware\CheckUserIsAdmin;
use App\Models\administradores;
use App\Models\arreglos;
use App\Models\documentos_de_las_empresas;
use App\Models\documentos_de_los_trabajadores;
use App\Models\empresas_terciarizadas;
use App\Models\guardias;
use App\Models\solicitudes_de_arreglo;
use App\Models\sucursales;
use App\Models\trabajadores_terciarizados;

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
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
        'Empresas Terciarizadas' => empresas_terciarizadas::all(),
        'Documentos de las empresas' => documentos_de_las_empresas::all(),
        'Trabajadores Terciarizados' => trabajadores_terciarizados::all(),
        'Documentos de los trabajadores' => documentos_de_los_trabajadores::all(),
        'Arreglos' => arreglos::all(),
        'Solicitudes de arreglo' => solicitudes_de_arreglo::all()
    ];
});

Route::get('/intento', function() {
    return Inertia::render('intento', [
        'sucursales' => sucursales::all(),
        'administradores' => administradores::all(),
        'guardias' => guardias::all(),
        'empresas_terciarizadas' => empresas_terciarizadas::all(),
        'documentos_de_las_empresas' => documentos_de_las_empresas::all(),
        'trabajadores_terciarizados' => trabajadores_terciarizados::all(),
        'documentos_de_los_trabajadores' => documentos_de_los_trabajadores::all(),
        'arreglos' => arreglos::all(),
        'solicitudes_de_arreglo' => solicitudes_de_arreglo::all()
    ]);
})->middleware(['auth', 'verified', CheckUserIsAdmin::class])->name('intento');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/sucursales', [SucursalesController::class, 'show'])->name('sucursales.show');
});

require __DIR__.'/auth.php';
