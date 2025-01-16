@extends('layoutWebmaster')

@section('contenido')

<style>
    .titulo {
        color: #C3BB38;
        font-family: "Solitreo";
        font-weight: 300;
        font-size: 70px;
        margin-bottom: -60px;
        margin-top: auto;
    }

    .subtitulo {
        color: #C3BB38;
        font-family: "Solitreo";
        font-weight: 400;
        font-size: 42px;
        margin-bottom: 30px;
    }

    .contenedor-datos {
        margin-top: 20px;
        margin-left: -10px;
        width: 1395px;
        height: auto;
        background: #000000;
        border-color: #C3BB38;
        border-width: 1px;
        border-style: solid;
        padding: 20px; /* Márgenes dentro del contenedor */
        border-radius: 15px;
    }

    .fila-datos {
        display: flex;
        justify-content: space-between;
        margin-bottom: 40px;
        margin-top: 80px;
    }

    .casilla {
        width: 48%; /* Dos columnas */
        border-radius: 15px;
    }

    .casilla label {
        display: block;
        font-family: "Solitreo";
        font-size: 30px; /* Letra más grande */
        color: #C3BB38;
        margin-bottom: 15px;
    }

    .boton-editar {
        text-align: center;
        margin-top: 30px;
    }

    .boton-editar button {
        width: 280px;
        height: 70px;
        background: #840705;
        color: #C3BB38;
        border-color: #F4EB49;
        border-width: 1px;
        border-style: solid;
        border-radius: 15px;
        font-family: "Solitreo";
        font-weight: 400;
        font-size: 58px; /* Letra más grande en el botón */
        cursor: pointer;
    }

    .boton-editar button:hover {
        background: #A00000;
    }
</style>

<div class="contenedor-datos">
    <h3 class="titulo">Bienvenido {{$usuario->nombre_usuario}}</h3>
    <h4 class="subtitulo">En esta sección podrá ver su información personal</h4>

    <div class="fila-datos">
        <div class="casilla">
            <label><strong>Email:</strong> {{$usuario->email}}</label>
            <label><strong>Teléfono:</strong> {{$usuario->telefono}}</label>
            <label><strong>Fecha de nacimiento:</strong> {{$usuario->fecha_nacimiento}}</label>
        </div>
        <div class="casilla">
            <label><strong>Dirección:</strong> {{$usuario->direccion}}</label>
            <label><strong>Nacionalidad:</strong> {{$usuario->nacionalidad}}</label>
            <label><strong>País:</strong> {{$usuario->pais_residencia}}</label>
        </div>
    </div>

    <div class="boton-editar">
        <button onclick="window.location.href='/Webmaster/perfil/editar-usuario'">Editar</button>
    </div>
</div>

@endsection