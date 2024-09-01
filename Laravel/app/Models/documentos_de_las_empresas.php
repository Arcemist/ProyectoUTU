<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentos_de_las_empresas extends Model
{
    use HasFactory;

    protected $table = 'documentos_de_las_empresas';

    protected $fillable = [
        'Pertenece_a',
        'Archivo',
    ];

    protected function Pertenece_a() {
        return $this->belongsTo(empresas_terciarizadas::class, 'Pertenece_a', 'RUT');
    }
}
