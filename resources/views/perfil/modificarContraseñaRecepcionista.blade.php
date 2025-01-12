@extends('layoutRecepcionista')

@section('contenido')

<style>
    .formulario {
        margin-top: 10px;
        width: 600px;
        height: auto;
        background: #000000;
        border-color: #C3BB38;
        color: #C3BB38;
        font-family: "Solitreo";
        border-width: 1px;
        border-style: solid;
        padding: 20px;
        border-radius: 10px;
        margin-left: auto;
        margin-right: auto;
        font-size: 40px;
        text-align: center;
    }

    .formulario label {
        font-family: "Solitreo";
        font-size: 38px;
        color: #C3BB38;
        margin-bottom: 10px;
        display: block;
    }

    .formulario input {
        width: 75%;
        padding: 10px;
        font-size: 18px;
        margin-bottom: 20px;
        border: 1px solid #C3BB38;
        border-radius: 5px;
        background: #202020;
        color: #C3BB38;
    }

    .boton-guardar {
        text-align: center;
        margin-top: 20px;
    }

    .boton-guardar button {
        width: 280px;
        height: 120px;
        background: #840705;
        color: #C3BB38;
        border-color: #F4EB49;
        border-width: 1px;
        border-style: solid;
        border-radius: 3px;
        font-family: "Solitreo";
        font-size: 36px;
        cursor: pointer;
    }

    .boton-guardar button:hover {
        background: #A00000;
    }

    .error {
        color: red;
        font-size: 16px;
        margin-bottom: 10px;
        font-family: "Solitreo";
    }
</style>

<div class="formulario">
    <h3 class="titulo">Modificar Contraseña</h3>
    <form action="/Recepcionista/perfil/modificar-contraseña/{{$usuario->email}}" method="POST">
        @csrf
        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        <label for="current_password">Contraseña Actual:</label>
        <input type="password" id="current_password" name="current_password" required>

        <label for="new_password">Nueva Contraseña:</label>
        <input type="password" id="new_password" name="new_password" required>

        <label for="repeat_password">Repetir Nueva Contraseña:</label>
        <input type="password" id="repeat_password" name="repeat_password" required>

        <div class="boton-guardar">
            <button type="submit">Actualizar Contraseña</button>
        </div>
    </form>
</div>

@endsection