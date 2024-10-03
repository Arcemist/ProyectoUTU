<?php

namespace App\Enums;

enum Roles: int {
    case ADMINISTRADOR = 'Administrador';
    case GUARDIA = 'Guardia';
    case EMPRESA = 'Empresa';
    case TRABAJADOR = 'Trabajador';
}
