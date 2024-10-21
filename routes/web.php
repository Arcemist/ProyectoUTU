<?php

use App\Enums\UserType;
use App\Http\Controllers\SucursalesController;
use App\Models\arreglos;
use App\Models\documentos;
use App\Models\sucursales;
use App\Models\User;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use function PHPUnit\Framework\returnSelf;


// Pagina de bienvenida por defecto
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->middleware('guest'); // esto hace que te mande a 'dashboard' o a 'home' o a '/' si ya estas logeado

Route::get('/logo', function () {
    
    return response()->file(public_path('Prueba de Logos.php'));
});

Route::get('Usuarios_registrados', function () {
    return Inertia::render('UsuariosRegistrados');
})->name('usuarios_registrados');

Route::get('Solicitudes_de_registro', function () {
    return Inertia::render('SolicitudesDeRegistro');
})->name('solicitudes_de_registro');

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
require __DIR__.'/Cosas_segun_tipo_de_usuario/administrador.php';
require __DIR__.'/Cosas_segun_tipo_de_usuario/guardia.php';
require __DIR__.'/Cosas_segun_tipo_de_usuario/empresa.php';
