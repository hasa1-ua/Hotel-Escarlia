<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoHabitacion extends Model
{
    use HasFactory;

    protected $table = 'tipos_habitaciones';

    protected $fillable = [
        'nombre',
        'plazas',
        'img'
    ];

    // Relaciones

    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class, 'tipo_id');
    }

    // Getters

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre ?? 'Sin nombre';
    }

    public function getDescripcion()
    {
        return $this->descripcion ?? 'No hay descripción';
    }

    public function getPlazas()
    {
        return $this->plazas ?? 'No hay plazas';
    }

    public function getCaracteristicas()
    {
        return json_decode($this->características) ?? 'No hay características';
    }

    public function getPrecio(){
        return $this->precio ?? 0.0;
    }

    public function getImg(){
        return $this->img;
    }

    // Setters

    public function setId($value)
    {
        $this->id = $value;
    }

    public function setNombre($value)
    {
        $this->nombre = $value;
    }

    public function setDescripcion($value)
    {
        $this->descripcion = $value;
    }

    public function setPlazas($value)
    {
        $this->plazas = $value;
    }

    public function setCaracteristicas($value)
    {
        $this->características = json_encode($value);
    }

    public function setPrecio($value){
        $this->precio = $value;
    }

    public function setImg($value){
        $this->img = $value;
    }

    // Métodos
    
}
