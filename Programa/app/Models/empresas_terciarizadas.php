<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresas_terciarizadas extends Model
{
    use HasFactory;

    protected $table = 'empresas_terciarizadas';

    public $incrementing = false;
    protected $primaryKey = 'RUT';
    protected $keyType = 'Integer';

    protected $attributes = [
        'Nombre'
    ] ;
}
