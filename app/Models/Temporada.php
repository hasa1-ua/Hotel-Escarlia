<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'multiplicador',
    ];

    // Relaciones
    
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'temporada_id');
    }

    // Getters

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre ?? 'Sin temporada';
    }

    public function getFechaInicio()
    {
        return $this->fecha_inicio ?? 'Sin fecha de inicio';
    }

    public function getFechaFin()
    {
        return $this->fecha_fin ?? 'Sin fecha de fin';
    }

    // Setters

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
    }

    // Métodos
    
}
