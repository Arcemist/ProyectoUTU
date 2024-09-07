<?php

namespace App\Enums;

enum Estado_solicitud: String {
    case ACEPTADA = 'Aceptada';
    case RECHAZADA = 'Rechazada';
    case EN_ESPERA = 'En_espera';
}
