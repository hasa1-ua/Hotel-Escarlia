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

.button1 {
  text-align: center;
  float: right;
  margin-right: 150px;
  margin-top: -200px;
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
</style>

<h3 class="titulo">Editar Habitación</h3>

<div class="container">

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('habitaciones.actualizar', $habitacion->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- PUT para actualizar -->

        <div class="form-group">
            <label class="letras1" for="numero">Número de Habitación:</label>
            <input class="celda" type="number" id="numero" name="numero" value="{{ $habitacion->numero }}" required>
        </div>

        <div class="form-group">
            <label class="letras1" for="planta">Planta:</label>
            <input class="celda" type="number" id="planta" name="planta" value="{{ $habitacion->planta }}" required>
        </div>

        <div class="form-group">
            <label class="letras1" for="vistas">Vistas:</label>
            <input class="celda" type="text" id="vistas" name="vistas" value="{{ $habitacion->vistas }}">
        </div>

        <div class="form-group">
            <label class="letras1" for="tipo_id">Tipo de Habitación:</label>
            <select class="celda" id="tipo_id" name="tipo_id" required>
                <option value="" disabled>Seleccionar tipo...</option>
                @foreach($tiposHabitacion as $tipo)
                    <option value="{{ $tipo->id }}" {{ $habitacion->tipo_id == $tipo->id ? 'selected' : '' }}>
                        {{ $tipo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="letras1" for="disponible">Disponible:</label>
            <select class="celda" id="disponible" name="disponible">
                <option value="1" {{ $habitacion->disponible ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$habitacion->disponible ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button type="submit" class="button1">Actualizar</button>
    </form>
</div>

@endsection
