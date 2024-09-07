<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class administradores extends Model
{
    use HasFactory;

    protected $table = 'administradores';

    public $incrementing = false;
    protected $primaryKey = 'Cedula';
    protected $keyType = 'Integer';

    protected $fillable = [
        'Nombre'
    ] ;
}
