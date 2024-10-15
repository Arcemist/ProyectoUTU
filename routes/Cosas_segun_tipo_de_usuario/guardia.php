<?php

use App\Enums\UserType;
use Illuminate\Support\Facades\Route;

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

