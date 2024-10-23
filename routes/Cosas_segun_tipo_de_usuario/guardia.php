<?php

use App\Enums\UserType;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

