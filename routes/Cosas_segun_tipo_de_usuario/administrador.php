<?php

use App\Enums\UserType;
use App\Models\arreglos;
use App\Models\documentos;
use App\Models\sucursales;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/administrador', function () {
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
    return Inertia::render('Administrador', [
        'EventosCalendario' => [$EventoCalendario],
        'InfoEventos' => [$InfoEvento]
    ]);
})->middleware(['auth', 'verified'])->name('administrador');

// cosas solo pa Administradores
Route::middleware([
    'auth',
    'verified',
    'CheckUserIs:'.UserType::ADMINISTRADOR->value
])->group(function () {
    Route::get('/intento', function () {
        return Inertia::render('intento', [
            'Paginas' => ['hola'],
            'usuarios' => user::all(),
            'sucursales' => sucursales::all(),
            'documentos' => documentos::all(),
            'arreglos' => arreglos::all(),
        ]);
    })->name('intento');

    Route::get('/sucursales', [SucursalesController::class, 'show'])->name('sucursales.show');
});
