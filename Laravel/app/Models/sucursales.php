<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sucursales extends Model
{
    use HasFactory;

    protected $table = 'sucursales';

    public $incrementing = false;
    protected $primaryKey = 'Nombre';
    protected $keyType = 'string';
}
