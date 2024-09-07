<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guardias extends Model
{
    use HasFactory;

    protected $table = 'guardias';

    public $incrementing = false;
    protected $primaryKey = 'Cedula';
    protected $keyType = 'Integer';

    protected $attributes = [
        'Nombre',
        'Trabaja_en'
    ] ;

    protected $fillable = [
        'Nombre',
        'Trabaja_en'
    ] ;
}
