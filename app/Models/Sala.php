<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'disponible',
    ];

    // Relaciones

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'recurso_id');
    }

    public function tipoSala()
    {
        return $this->belongsTo(TipoSala::class, 'tipo_sala_id');
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class, 'sala_id');
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

    public function getAforo()
    {
        return $this->aforo ?? 0;
    }

    public function getDisponible()
    {
        return $this->disponible ?? true;
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

    public function setAforo($aforo)
    {
        $this->aforo = $aforo;
    }

    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;
    }

    public static function selectidbytype($tipoid){
        return self::with(['tipoSala'])
                    ->where('tipo_sala_id', $tipoid)
                    ->where('disponible', true)
                    ->first();
    }

    public static function selectidbySala($tipoid){
        return self::with(['tipoSala'])->find($tipoid);
    }

    // Metodos CRUD
    

    public function eliminarSala(){
        $this->delete();
    }

    public static function deleteWithId($id){
        Sala::find($id)->delete();
    }

    public static function obtenerSalaporId($id){
        return self::find($id);
    }

}
