<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notificacionesAdministrador extends Model
{
    use HasFactory;

    protected $table = 'notificaciones_administrador';

    public $timestamps = false;

    protected $attributes = [
        'Nombre' => '',
        'Descripcion' => '',
        'Ruta' => '',
    ];

    protected $fillable = [
        'Nombre',
        'Descripcion',
        'Ruta'
    ];
}
