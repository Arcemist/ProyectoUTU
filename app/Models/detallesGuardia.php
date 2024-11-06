<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallesGuardia extends Model
{
    //use HasFactory;

    protected $table = 'detalles_guardia';

    public $timestamps = true;

    public $incrementing = false;

    protected $attributes = [
        'Guardia' => 0
    ];

    protected $fillable = [
        'Guardia'
    ];

    public function Es_de() {
        return $this->belongsTo(User::class, 'Guardia', 'id');
    }
}
