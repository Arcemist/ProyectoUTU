<?php

use App\Enums\UserType;
use App\Http\Controllers\SucursalesController;
use App\Models\arreglos;
use App\Models\arreglosHistorial;
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
    return response()->file(public_path('Logo.pdf'));
});

Route::get('/database', function () {
    return response()->json([
        'Sucursales' => sucursales::all(),
        'Usuarios' => User::all(),
        'Documentos' => documentos::all(),
        'Arreglos' => arreglos::all(),
        'ArreglosHistorial' => arreglosHistorial::all(),
    ]);
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
Route::Group([
    'prefix' => 'administrador',
    'middleware' => [
        'auth',
        'verified',
        'CheckUserIs:'.UserType::ADMINISTRADOR->value
    ]],
function() {
    Route::get('/intento', function () {
        return Inertia::render('Administrador/intento', [
            'Paginas' => [],
            'usuarios' => user::all(),
            'sucursales' => sucursales::all(),
            'documentos' => documentos::all(),
            'arreglos' => arreglos::all(),
            'arreglosHistorial' => arreglosHistorial::all()
        ]);
    })->name('intento');

    Route::get('/calendario', function () {
        $EventoCalendario = [
            'key' => 1,
            'highlight' => [
                'color' => 'purple',
                'fillMode' => 'outline'
            ],
            'dates' => '9/9/2024',
        ];

        $InfoEvento = [
            'fecha' => '9/9/2024',
            'descripcion' => 'hola como anda usted'
        ];

        // Importante que 'EventosCalendario' sea un array de arrays sino no le gusta al Vcalendar
        return Inertia::render('Administrador/Calendario', [
            'EventosCalendario' => [$EventoCalendario],
            'InfoEventos' => [$InfoEvento]
        ]);
    })->name('administrador.calendario');

    Route::get('usuarios_registrados', function () {
        return Inertia::render('Administrador/UsuariosRegistrados');
    })->name('administrador.usuarios_registrados');

    Route::get('solicitudes_de_registro', function () {
        return Inertia::render('Administrador/SolicitudesDeRegistro');
    })->name('administrador.solicitudes_de_registro');
});


// Cosas solo pa Empresas
Route::Group([
    'prefix' => 'empresa',
    'middleware' => [
        'auth',
        'verified',
        'CheckUserIs:'.UserType::EMPRESA->value
    ]],
function () {

    Route::get('/eventos', function () {
        return Inertia::render('Empresa/Eventos');
    })->name('empresa.eventos');

});


// Cosas solo pa Guardias
Route::Group([
    'prefix' => 'guardia',
    'middleware' => [
        'auth',
        'verified',
        'CheckUserIs:'.UserType::GUARDIA->value
    ]],
function () {

    Route::get('/calendario', function () {
        $EventoCalendario = [
            'key' => 1,
            'highlight' => [
                'color' => 'purple',
                'fillMode' => 'outline'
            ],
            'dates' => '10/17/2024',
            'description' => 'esto es un test',
        ];

        $InfoEvento = [
            'fecha' => '9/9/2024',
            'descripcion' => 'The Reckoning Approaches'
        ];

        // Importante que 'EventosCalendario' sea un array de arrays sino no le gusta al Vcalendar
        return Inertia::render('Guardia/Calendario', [
            'EventosCalendario' => [$EventoCalendario],
            'InfoEventos' => [$InfoEvento]
        ]);
    })->name('guardia.eventos');

});

require __DIR__.'/auth.php';
