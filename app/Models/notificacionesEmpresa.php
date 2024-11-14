<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class notificacionesEmpresa extends Model
{
    use HasFactory;

    protected $table = 'notificaciones_empresa';

    public $timestamps = false;

    protected $attributes = [
        'Nombre' => '',
        'Descripcion' => '',
        'Pertenece_a' => 0,
        'Ruta' => '',
    ];

    protected $fillable = [
        'Nombre',
        'Descripcion',
        'Pertenece_a',
        'Ruta'
    ];

    public function Pertenece_a() {
        return $this->belongsTo(User::class, 'Pertenece_a', 'id');
    }
}
