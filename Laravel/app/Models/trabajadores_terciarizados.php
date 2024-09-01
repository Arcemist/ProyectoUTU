<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trabajadores_terciarizados extends Model
{
    use HasFactory;

    protected $table = 'trabajadores_terciarizados';

    public $incrementing = false;
    protected $primaryKey = 'Cedula';
    protected $keyType = 'integer';

    protected $fillable = [
        'Nombre',
        'Trabaja_en',
    ];

    protected function Trabaja_en() {
        return $this->belongsTo(empresas_terciarizadas::class, 'Trabaja_en', 'RUT');
    }
}
