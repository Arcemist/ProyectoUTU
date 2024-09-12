<?php

use App\Enums\UserType;
use App\Http\Controllers\SucursalesController;
use App\Http\Middleware\CheckUserType;
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

// Pagina de bienvenida por defecto
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->middleware('guest'); // esto hace que te mande a 'dashboard' o a 'home' o a '/' si ya estas logeado

Route::get('/administrador', function () {
    return Inertia::render('Administrador');
});

// Cosas generales de usuarios logeados
Route::middleware([
    'auth',
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// cosas solo pa Administradores
Route::middleware([
    'auth',
    'verified',
    'CheckUserIs:'.UserType::ADMINISTRADOR->value
])->group(function () {
    Route::get('/intento', function () {
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
    })->name('intento');

    Route::get('/sucursales', [SucursalesController::class, 'show'])->name('sucursales.show');
});

// Cosas solo pa Guardias
Route::middleware([
    'auth',
    'verified',
    'CheckUserIs:'.UserType::GUARDIA->value
])->group(function () {
    Route::get('/probando', function () {
        return ['hola'];
    });
});

// Cosas solo pa Empresas
Route::middleware([
    'auth',
    'verified',
    'CheckUserIs:'.UserType::EMPRESA->value
])->group(function () {

});

// Cosas solo pa Trabajadores
Route::middleware([
    'auth',
    'verified',
    'CheckUserIs:'.UserType::TRABAJADOR->value
])->group(function () {

});

// Ejemplo pa checkear base de datos
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

require __DIR__.'/auth.php';
