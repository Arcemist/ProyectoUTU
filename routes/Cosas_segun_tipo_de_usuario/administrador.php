<?php

use App\Enums\UserType;
use App\Models\arreglos;
use App\Models\documentos;
use App\Models\sucursales;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
