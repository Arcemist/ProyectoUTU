<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sucursales extends Model
{
    use HasFactory;

    protected $table = 'sucursales';
    public $timestamps = false;

    public $incrementing = true;

    protected $attributes = [
        'Nombre' => ''
    ];

    protected $fillable = [
        'Nombre'
    ];

    public function id() {
        return $this->attributes['id'];
    }
}
