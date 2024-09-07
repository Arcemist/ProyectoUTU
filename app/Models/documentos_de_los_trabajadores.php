<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentos_de_los_trabajadores extends Model
{
    use HasFactory;

    protected $table = 'documentos_de_los_trabajadores';

    protected $fillable = [
        'Pertenece_a',
        'Archivo',
    ];

    protected function Pertenece_a() {
        return $this->belongsTo(trabajadores_terciarizados::class, 'Pertenece_a', 'Cedula');
    }
}
