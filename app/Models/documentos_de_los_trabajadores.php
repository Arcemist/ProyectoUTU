<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentos_de_los_trabajadores extends Model
{
    use HasFactory;

    protected $table = 'documentos_de_los_trabajadores';

    protected $attributes = [
        'Pertenece_a',
        'Archivo',
    ];

    protected $fillable = [
        'Pertenece_a',
        'Archivo',
    ];

    public function Pertenece_a() {
        return $this->belongsTo(trabajadores_terciarizados::class, 'Pertenece_a', 'Cedula');
    }
}
