@extends('layoutUsuario')

@section('contenido')

<style>
.container {
  width: 95%;
  padding: 30px;
  background: #000000;
  border: 2px solid #C3BB38;
  margin: 20px auto;
  display: flex;
  justify-content: space-between;
}

.left-column {
  width: 60%;
  color: #C3BB38;
  font-family: "Solitreo";
  font-size: 28px;
}

.right-column {
  width: 35%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.room-image {
  width: 100%;
  max-width: 500px;
  border: 3px solid #C3BB38;
  border-radius: 10px;
}

input[type="text"], input[type="date"] {
  width: 90%;
  padding: 15px;
  margin: 10px 0;
  border: 2px solid #C3BB38;
  background-color: #000000;
  color: #C3BB38;
  font-size: 20px;
  border-radius: 5px;
}

.button1, .button2 {
  width: 220px;
  height: 60px;
  background: #840705;
  color: #C3BB38;
  border: 2px solid #C3BB38;
  border-radius: 5px;
  font-family: "Solitreo";
  font-size: 24px;
  margin-top: 20px;
  margin-right: 20px;
  cursor: pointer;
}

.button-container {
  display: flex;
  justify-content: flex-start;
}
</style>

<div class="container">
    <div class="left-column">
        <h2>Reserva la sala: {{ $sala->getNombre() }}</h2>

        <form method="POST" action="{{ route('usuario.reservar.sala', ['id' => $sala->id]) }}">
            @csrf

            <label for="fecha_inicio">Fecha de Inicio:</label><br>
            <input type="date" name="fecha_inicio" required><br>

            <label for="fecha_fin">Fecha de Fin:</label><br>
            <input type="date" name="fecha_fin" required><br>

            <label for="cupon">Cupón de Descuento:</label><br>
            <input type="text" name="cupon" placeholder="Introduce un cupón si tienes"><br>

            <div class="button-container">
                <a href="{{ route('usuario.reservaSala.confirmacion', ['id' => $reserva->id]) }}" class="button1">Confirmar</a>
                <button type="button" onclick="window.history.back();" class="button2">Cancelar</button>
            </div>
        </form>
    </div>

    <div class="right-column">
        <img src="{{ asset($sala->tipoSala->img) }}" alt="Imagen de la sala" class="room-image">
    </div>
</div>

@endsection