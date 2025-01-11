@extends('layoutUsuario')

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

    .separar-enunciados{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modificar-contrasena{
        width: 340px;
        height: 60px;
        background: #840705;
        color: #C3BB38;
        border-color: #F4EB49;
        border-width: 1px;
        border-style: solid;
        border-radius: 3px;
        font-family: 'Solitreo';
        font-size: 30px;
        cursor: pointer;
        margin-top: -30px;
    }

    .formulario {
        margin-top: 20px;
        width: 1390px;
        margin-left: -10px;
        height: auto;
        background: #000000;
        border-color: #C3BB38;
        border-width: 1px;
        border-style: solid;
        padding: 25px;
        border-radius: 10px;
    }

    .fila-datos {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .columna {
        width: 48%; /* Ajustar al 48% para hacer dos columnas */
        display: flex;
        flex-direction: column;
    }

    .formulario label {
        font-family: "Solitreo";
        font-size: 24px;
        color: #C3BB38;
        margin-bottom: 10px;
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
        width: 210px;
        height: 52px;
        background: #840705;
        color: #C3BB38;
        border-color: #F4EB49;
        border-width: 1px;
        border-style: solid;
        border-radius: 3px;
        font-family: "Solitreo";
        font-size: 40px;
        cursor: pointer;
        margin-left: -120px;
    }

    .boton-guardar button:hover {
        background: #A00000;
    }
</style>

<div class="formulario">
    <div class="separar-enunciados">
        <div>
            <h3 class="titulo">Bienvenido {{$usuario->nombre_usuario}}</h3>
            <h4 class="subtitulo">En esta sección podrá modificar su información personal</h4>
        </div>
        <div>
            <button class="modificar-contrasena" onclick="window.location.href='/Usuario/perfil/modificar-contraseña'">Modificar Contraseña</button>
        </div>
    </div>

    <form action="/Usuario/perfil/editar-usuario/{{$usuario->email}}" method="POST">
        @csrf

        <div class="fila-datos">
            <div class="columna">
                <label for="nombre_usuario">Nombre de Usuario: </label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" value="{{ $usuario->nombre_usuario }}">

                <label for="pais_residencia">País de Residencia: </label>
                <input type="text" id="pais_residencia" name="pais_residencia" value="{{ $usuario->pais_residencia }}">

                <label for="nacionalidad">Nacionalidad: </label>
                <input type="text" id="nacionalidad" name="nacionalidad" value="{{ $usuario->nacionalidad }}">

                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" value="{{ $usuario->direccion }}">
            </div>

            <div class="columna">
                <label for="email">Email: </label>
                <input type="email" id="email" name="email" value="{{ $usuario->email }}">

                <label for="telefono">Teléfono: </label>
                <input type="text" id="telefono" name="telefono" value="{{ $usuario->telefono }}">

                <label for="fecha_nacimiento">Fecha de Nacimiento: </label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $usuario->fecha_nacimiento }}">

                <div class="boton-guardar">
                    <button type="submit">Guardar</button>
                </div>
            </div>
        </div>

        
    </form>
</div>

@endsection