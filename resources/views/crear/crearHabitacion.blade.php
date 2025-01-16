@extends('layoutWebmaster')

@section('contenido')

<style>
.titulo {
  color: #C3BB38;
  font-family: "Yellowtail";
  font-weight: 300;
  font-size: 72px;
  text-align: center;
}

.container {
  margin-top: -20px;
  margin-left: -10px;
  width: 1420px;
  height: 849px;
  padding: 8px;
  background: #000000;
  border-color: #C3BB38;
  border-width: 1px;
  border-style: solid;
}

.letras1 {
  width: 479px;
  height: 68px;
  color: #C3BB38;
  font-family: "Solitreo";
  font-weight: 400;
  font-size: 48px;
  text-align: left;
  white-space: nowrap;
}

img {
  width: 736px;
  height: 457px;
  margin-top: -400px;
  margin-left: 600px;
  align-items: left;
}

button {
  width: 363px;
  height: 73px;
  background: #840705;
  color: #C3BB38;
  border-color: #C3BB38;
  border-width: 1px;
  border-style: solid;
  border-radius: 3px;
  font-family: "Solitreo";
  font-weight: 400;
  font-size: 60px;
}

.button-1 {
  margin-top: 20px;
  margin-left: 20px;
}

.celda {
  padding: 10px;
  font-size: 48px;
  font-family: "Solitreo";
  border: 1px solid #C3BB38;
  border-radius: 5px;
  background-color: #840705;
  color: #C3BB38;
  width: 300px;
  height: 70px;
}

.celda:focus {
  outline: none;
  border-color: #840705;
  box-shadow: 0 0 5px rgba(132, 7, 5, 0.5);
}

.form-group {
  margin-top: 20px;
  margin-left: 20px;
}

.custom-file-container {
  position: relative;
  display: inline-block;
  cursor: pointer;
}

.custom-file-container input[type="file"] {
  position: absolute;
  opacity: 0;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  cursor: pointer;
}

.custom-file-button {
  padding: 10px 20px;
  background-color: #840705;
  color: #C3BB38;
  border: 1px solid #C3BB38;
  border-radius: 5px;
  cursor: pointer;
  font-size: 48px;
  text-align: center;
}

.custom-file-button:hover {
  background-color: rgb(84, 4, 3);
  cursor: pointer;
}
</style>

<h3 class="titulo">Crear Habitación</h3>

<div class="container">
    <form method="POST" action="{{ route('habitaciones.guardar') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label class="letras1" for="numero">Número de Habitación:</label>
            <input class="celda" type="number" id="numero" name="numero" placeholder="Ej: 101" required>
        </div>

        <div class="form-group">
            <label class="letras1" for="planta">Planta:</label>
            <input class="celda" type="number" id="planta" name="planta" placeholder="Ej: 1" required>
        </div>

        <div class="form-group">
            <label class="letras1" for="vistas">Vistas:</label>
            <input class="celda" type="text" id="vistas" name="vistas" placeholder="Ej: Vista al jardín">
        </div>

        <div class="form-group">
            <label class="letras1" for="tipo_id">Tipo de Habitación:</label>
            <select class="celda" id="tipo_id" name="tipo_id" required>
                <option value="" disabled selected>Seleccionar tipo...</option>
                @foreach($tiposHabitacion as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="letras1" for="disponible">Disponible:</label>
            <select class="celda" id="disponible" name="disponible">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="form-group">
            <label class="letras1" for="img">Imagen:</label>
            <div class="custom-file-container">
                <button type="button" class="custom-file-button">Subir Imagen</button>
                <input type="file" id="img" name="img">
            </div>
        </div>

        <button type="submit" class="button-1">Crear Habitación</button>
    </form>
</div>

@endsection
