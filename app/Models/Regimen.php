<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regimen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
    ];

    // Relaciones
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'regimen_id');
    }

    // Getters

    
}
