<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoHabitacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'plazas',
    ];

    // Relaciones

    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class, 'tipo_id');
    }

    public function precios()
    {
        return $this->hasMany(TipoHabitacion::class, 'tipo_habitacion_id');
    }

    // Getters

    public function getId()
    {
        return $this->id;
    }

    public function getNombreAttribute()
    {
        return $this->nombre ?? 'Sin nombre';
    }

    public function getDescripcionAttribute()
    {
        return $this->descripcion ?? 'No hay descripción';
    }

    public function getPlazasAttribute()
    {
        return $this->plazas ?? 'No hay plazas';
    }

    public function getCaracteristicasAttribute()
    {
        return json_decode($this->características) ?? 'No hay características';
    }

    // Setters

    public function setId($value)
    {
        $this->id = $value;
    }

    public function setNombreAttribute($value)
    {
        $this->nombre = $value;
    }

    public function setDescripcionAttribute($value)
    {
        $this->descripcion = $value;
    }

    public function setPlazasAttribute($value)
    {
        $this->plazas = $value;
    }

    public function setCaracteristicasAttribute($value)
    {
        $this->características = json_encode($value);
    }

    // Métodos
    
}
