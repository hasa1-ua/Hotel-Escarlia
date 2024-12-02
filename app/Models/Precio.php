<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    use HasFactory;

    protected $fillable = [
        'precio',
        'tipo_habitacion_id',
        'sala_id',
        'temporada_id',
    ];

    // Relaciones

    public function tipoHabitacion()
    {
        return $this->belongsTo(TipoHabitacion::class, 'tipo_habitacion_id');
    }

    public function tipoSala()
    {
        return $this->belongsTo(TipoSala::class, 'tipo_sala_id');
    }

    public function temporada()
    {
        return $this->belongsTo(Temporada::class, 'temporada_id');
    }

    // Getters

    public function getId()
    {
        return $this->id;
    }

    public function getPrecio()
    {
        return $this->precio ?? 0;
    }

    public function getTipoRecurso()
    {
        return $this->tipo_recurso;
    }

    // Setters

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function setTipoRecurso($tipo_recurso)
    {
        $this->tipo_recurso = $tipo_recurso;
    }

    // Métodos

}
