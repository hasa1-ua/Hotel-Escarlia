<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSala extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    // Relaciones

    public function salas()
    {
        return $this->hasMany(Sala::class, 'tipo_sala_id');
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
        return $this->descripcion ?? 'Sin descripción';
    }

    // Setters

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    // Métodos
    
}
