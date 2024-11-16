<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificacionAdministrador extends Model
{
    use HasFactory;

    protected $table = 'notificaciones_administrador';

    public $timestamps = true;

    protected $attributes = [
        'Nombre' => '',
        'Descripcion' => '',
        'Ruta' => '',
        'Tipo' => ''
    ];

    protected $fillable = [
        'Nombre',
        'Descripcion',
        'Ruta',
        'Tipo'
    ];
}
