<?php

namespace App\Enums;

enum UserType: String {
    case ADMINISTRADOR = 'Administrador';
    case GUARDIA = 'Guardia';
    case EMPRESA = 'Empresa';
    case TRABAJADOR = 'Trabajador';
}
