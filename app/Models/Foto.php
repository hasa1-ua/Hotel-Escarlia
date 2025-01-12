<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
    ];

    // Relaciones
    public function sala()
    {
        return $this->belongsTo(Sala::class, 'sala_id');
    }

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class, 'habitacion_id');
    }

    // Getters

    public function getId()
    {
        return $this->id;
    }

    public function getUrl()
    {
        return $this->url ?? 'Sin URL';
    }

    // Setters

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    // Métodos

    

    
}
