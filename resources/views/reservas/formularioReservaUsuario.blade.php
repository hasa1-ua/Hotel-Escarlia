@extends('layoutRecepcionista')

@section('contenido')

<style>
/* Contenedor principal más grande */
.container {
  width: 95%;
  height: auto;
  padding: 30px;
  background: #000000;
  border-color: #C3BB38;
  border-width: 2px;
  border-style: solid;
  margin: 20px auto;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}

/* Columna izquierda para el formulario */
.left-column {
  width: 60%;
  color: #C3BB38;
  font-family: "Solitreo";
  font-size: 28px;
}

/* Columna derecha para la imagen */
.right-column {
  width: 35%;
  display: flex;
  justify-content: center;
  align-items: center;
}

/* Imagen de la habitación */
.room-image {
  width: 100%;
  max-width: 500px;
  border: 3px solid #C3BB38;
  border-radius: 10px;
}

/* Inputs más grandes */
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

/* Botones grandes */
.button1, .button2 {
  width: 220px;
  height: 60px;
  background: #840705;
  color: #C3BB38;
  border-color: #C3BB38;
  border-width: 2px;
  border-style: solid;
  border-radius: 5px;
  font-family: "Solitreo";
  font-weight: bold;
  font-size: 24px;
  text-align: center;
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
        <h2>Reserva la habitación: {{ $habitacion->tipo->nombre }}</h2>

        <form method="POST" action="{{ route('recepcionista.reservar', ['tipoid' => $habitacion->tipo_id, 'id' => $habitacion->id]) }}">
            @csrf

            <label for="nombre_huesped">Nombre del Huésped:</label><br>
            <input type="text" name="nombre_huesped" placeholder="Introduce el nombre del huésped" required><br>

            <label for="tipo_alojamiento">Tipo de Alojamiento:</label><br>
            <div class="radio-group">
                <input type="radio" name="tipo_alojamiento" value="Solo Alojamiento" checked> Solo Alojamiento<br>
                <input type="radio" name="tipo_alojamiento" value="Alojamiento + Desayuno"> Alojamiento + Desayuno<br>
                <input type="radio" name="tipo_alojamiento" value="Media Pensión"> Media Pensión<br>
                <input type="radio" name="tipo_alojamiento" value="Pensión Completa"> Pensión Completa<br>
            </div><br>

            <label for="fecha_inicio">Fecha de Inicio:</label><br>
            <input type="date" name="fecha_inicio" required><br>

            <label for="fecha_fin">Fecha de Fin:</label><br>
            <input type="date" name="fecha_fin" required><br>

            <label for="cupon">Cupón de Descuento:</label><br>
            <input type="text" name="cupon" placeholder="Introduce un cupón si tienes"><br>

            <div class="button-container">
                <button type="submit" class="button1">Confirmar</button>
                <button type="button" onclick="window.history.back();" class="button2">Cancelar</button>
            </div>
        </form>
    </div>

    <div class="right-column">
        <img src="{{ asset($habitacion->tipo->img) }}" alt="Imagen de la habitación" class="room-image">
    </div>
</div>

@endsection
