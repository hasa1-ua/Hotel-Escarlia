<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre_usuario',
        'email',
        'password',
        'fecha_nacimiento',
        'direccion',
        'nacionalidad',
        'pais_residencia',
        'telefono',
        'rol',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relaciones
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'usuario_id');
    }

    public function cupones()
    {
        return $this->hasMany(Cupon::class, 'usuario_id');
    }

    // Getters

    public function getId() {
        return $this->id;
    }

    public function getNombreUsuario() {
        return $this->nombre_usuario;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getTelefono() {
        return $this->telefono ?? 'Sin teléfono';
    }

    public function getDireccion() {
        return $this->direccion ?? 'Sin dirección';
    }

    public function getFechaNacimiento() {
        return $this->fecha_nacimiento ?? 'Sin fecha de nacimiento';
    }

    public function getNacionalidad() {
        return $this->nacionalidad ?? 'Sin nacionalidad';
    }

    public function getPaisResidencia() {
        return $this->pais_residencia ?? 'Sin país de residencia';
    }

    public function getRol() {
        return $this->rol;
    }

    // Setters

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombreUsuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setFechaNacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function setNacionalidad($nacionalidad) {
        $this->nacionalidad = $nacionalidad;
    }

    public function setPaisResidencia($pais_residencia) {
        $this->pais_residencia = $pais_residencia;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    // Métodos

    public function isWebmaster() {
        return $this->rol === 'Webmaster';
    }

    public function isRecepcion() {
        return $this->rol === 'Recepción';
    }

    public function isCliente() {
        return $this->rol === 'Cliente';
    }

    public static function obtenerUsuarioPorEmail($email)
    {
        return self::where('email', $email)->first();
    }

    public function eliminarUsuario(){
        $this->delete();
    }

}
