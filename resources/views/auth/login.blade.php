@extends('layoutPublico')
@section('contenido')
<!DOCTYPE html>
<style>
    .titulo {
        color: #C3BB38;
        font-family: "Solitreo";
        font-weight: 300;
        font-size: 70px;
        margin-bottom: 0px;
        margin-top: auto;
        text-align: center;
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

    .formulario label {
        font-family: "Solitreo";
        font-size: 40px;
        color: #C3BB38;
        margin-bottom: 10px;
        margin-left: 150px;
    }

    .formulario input {
        font-family: "Solitreo";
        width: 75%;
        padding: 10px;
        font-size: 40px;
        margin-bottom: 20px;
        border: 1px solid #C3BB38;
        border-radius: 5px;
        background: #5E0202;
        color: #C3BB38;
        margin-left: 150px;
    }

    .boton-guardar {
        text-align: center;
        margin-top: 20px;
    }

    .boton-guardar button {
        width: 310px;
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
        border-radius: 15px;
    }

    .boton-guardar button:hover {
        background: #A00000;
    }

    .error-container {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        padding: 10px;
        margin-bottom: 20px;
        margin-top: 20px;
        border-radius: 5px;
        font-family: Arial, sans-serif;
    }
    .error-container ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }
</style>
<html>
<head>
    <title>Login</title>
</head>
<div class="formulario">
    <h1 class="titulo">Bienvenido al Hotel Escarlia</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
        </div>
        <div>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="password">Password:</label>
        </div>
        <div>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="boton-guardar">
            <button type="submit">Iniciar Sesión</button>
        </div>
        @if ($errors->any())
            <div class="error-container">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</div>
</html>
@endsection