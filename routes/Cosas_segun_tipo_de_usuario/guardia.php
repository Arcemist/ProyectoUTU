<?php

use App\Enums\UserType;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/guardia', function () {
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
    return Inertia::render('Guardia', [
        'EventosCalendario' => [$EventoCalendario],
        'InfoEventos' => [$InfoEvento]
    ]);
})->middleware(['auth', 'verified'])->name('guardia');

// Cosas solo pa Guardias
Route::middleware([
    'auth',
    'verified',
    'CheckUserIs:'.UserType::GUARDIA->value
])->group(function () {

});

