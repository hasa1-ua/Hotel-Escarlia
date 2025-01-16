<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    use HasFactory;

    protected $table = 'cupones';

    protected $fillable = [
        'codigo',
        'descuento',
        'fecha_expiracion',
        'utilizado',
    ];

    // Relaciones

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'reserva_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Getters

    public function getId()
    {
        return $this->id;
    }

    public function getCodigo()
    {
        return $this->codigo ?? 'Sin código';
    }

    public function getDescuento()
    {
        return $this->descuento ?? 0;
    }

    public function getFechaExpiracion()
    {
        return $this->fecha_expiracion ?? 'Sin fecha de expiración';
    }

    public function getUtilizado()
    {
        return $this->utilizado ?? false;
    }

    // Setters

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;
    }

    public function setFechaExpiracion($fecha_expiracion)
    {
        $this->fecha_expiracion = $fecha_expiracion;
    }

    public function setUtilizado($utilizado)
    {
        $this->utilizado = $utilizado;
    }

    // Métodos

    public function obtenerDescuento($monto)
    {
        return $monto - ($monto * $this->getDescuento() / 100);
    }

    public function eliminarCupon(){
        $this->delete();
    }
    
}
