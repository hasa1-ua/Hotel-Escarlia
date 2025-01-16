<style>

.titulo {
  color: #C3BB38;
  font-family: "Yellowtail";
  font-weight: 300;
  font-size: 72px;
  text-align: center;
}


.container{
  margin-top: -20px;
  margin-left: -10px;
  width: 1420px;
  height: 900px;
  padding: 8px 8px 8px 8px;
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

img{
  width: 736px;
  height: 457px;
  margin-top: 50px;
  margin-left: 600px;
  align-items: left;
  display: inline;
}



button {
  width: 363px;
  height: 73px;
  background: #840705;
  color: #C3BB38;
  border-color: #C3BB38;
  border-width: 1px;
  border-style: solid;
  border-radius: 3px 3px 3px 3px;
  font-family: "Solitreo";
  font-weight: 400;
  font-size: 60px;
  margin-left: 20px;
  
}

.button1{
  margin-top: 40px;
}


.celda{
    padding: 10px;
    font-size: 48px; 
    font-family: "Solitreo";
    border: 1px solid #C3BB38; /* Borde del input */
    border-radius: 5px;
    background-color: #840705; /* Fondo rojo claro */
    color: #C3BB38; /* Texto en rojo oscuro */
    width: 300px;
    height: 70px;
}

.label{
  margin-top: 0px;
}

.form-group label[for="descripcion"] {
    margin-top: 20px; /* Ajusta este valor según necesites */
    display: block;
}

.celda:focus{
    outline: none;
    border-color: #840705; /* Borde rojo al hacer foco */
    box-shadow: 0 0 5px rgba(132, 7, 5, 0.5); /* Sombra cuando se hace foco */
}

.form-group{
    margin-top: 20px;
    margin-left: 20px;
}

.custom-file-container {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

    /* Input file invisible pero funcional */
    .custom-file-container input[type="file"] {
        position: absolute;
        opacity: 0;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    /* Botón personalizado */
    .custom-file-button {
        padding: 10px 20px;
        background-color:  #840705;
        color: #C3BB38;
        border: 1px solid #C3BB38;
        border-radius: 5px;
        cursor: pointer;
        font-size: 48px;
        text-align: center;
    }

    .custom-file-button:hover {
        background-color:rgb(84, 4, 3);
        cursor: pointer;
    }

</style>


@extends('layoutWebmaster')

@section('contenido')
    <h3 class="titulo">Editar Reserva</h3>

    <div class="container">


    <div class="label">

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif


    <form action="{{ route('reservas.actualizar', $reservas->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Método PUT para actualizar -->
        
        <div class="form-group">
        <label for="usuario_id" class="letras1">Usuario*:</label>
        <select class="celda" name="usuario_id" id="usuario_id" required>
        <option value="">Seleccione un usuario</option>
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}" {{ $reservas->usuario_id == $usuario->id ? 'selected' : '' }}>
                    {{ $usuario->nombre_usuario }}
                </option>
            @endforeach
        </select>
        </div>


        <div class="form-group">
        <label for="habitacion_id" class="letras1">Habitacion:</label>
        <select class="celda" name="habitacion_id" id="habitacion_id">
        <option value="" {{ is_null($reservas->habitacion_id) ? 'selected' : '' }}>Sin habitacion</option>
            @foreach ($habitacion as $habitacion)
                <option value="{{ $habitacion->id }}" {{ $reservas->habitacion_id == $habitacion->id ? 'selected' : '' }}>
                    {{ $habitacion->numero }}
                </option>
            @endforeach
        </select>
        

        <label for="sala_id" class="letras1">Sala:</label>
        <select class="celda" name="sala_id" id="sala_id">
        <option value="" {{ is_null($reservas->sala_id) ? 'selected' : '' }}>Sin sala</option>
            @foreach ($sala as $sala)
                <option value="{{ $sala->id }}" {{ $reservas->sala_id == $sala->id ? 'selected' : '' }}>
                    {{ $sala->nombre }}
                </option>
            @endforeach
        </select>
        </div>

        <div class="form-group">
        <label for="cupon_id" class="letras1">Cupon:</label>
        <select class="celda" name="cupon_id" id="cupon_id">
        <option value="" {{ is_null($reservas->cupon_id) ? 'selected' : '' }}>Sin cupon</option>
            @foreach ($cupon as $cupon)
                <option value="{{ $cupon->id }}" {{ $reservas->cupon_id == $cupon->id ? 'selected' : '' }}>
                    {{ $cupon->descuento }}
                </option>
            @endforeach
        </select>
        </div>

        <div class="form-group">
        <label for="regimen_id" class="letras1">Regimen*:</label>
        <select class="celda" name="regimen_id" id="regimen_id" required>
        <option value="" disabled>Selecciona regimen</option>
            @foreach ($regimen as $regimen)
                <option value="{{ $regimen->id }}" {{ $reservas->regimen_id == $regimen->id ? 'selected' : '' }}>
                    {{ $regimen->nombre }}
                </option>
            @endforeach
        </select>
        </div>

        <div class="form-group">
        <label for="temporada_id" class="letras1">Temporada*:</label>
        <select class="celda" name="temporada_id" id="temporada_id" required>
        <option value="" disabled>Selecciona temporada</option>
            @foreach ($temporada as $temporada)
                <option value="{{ $temporada->id }}" {{ $reservas->temporada_id == $temporada->id ? 'selected' : '' }}>
                    {{ $temporada->nombre }}
                </option>
            @endforeach
        </select>
        </div>

        <div class="form-group">
            <label class="letras1" for="fecha_inicio">Fecha inicio*:</label>
            <input class="celda" style=" margin-left: 20px;"  type="date" id="fecha_inicio" name="fecha_inicio" value="{{ $reservas->fecha_inicio}}">

            <label class="letras1" for="fecha_fin">Fecha fin*:</label>
            <input class="celda" style=" margin-left: 20px;"  type="date" id="fecha_fin" name="fecha_fin" value="{{ $reservas->fecha_fin}}">
        </div>

        <div class="form-group">
            <label class="letras1" for="estado">Estado*:</label>
            <select class="celda" style=" margin-left: 20px;"  id="estado" name="estado">
                <option value="Confirmada" {{ $reservas->estado == "Confirmada" ? 'selected' : '' }}>Confirmada</option>
                <option value="Pendiente" {{ $reservas->estado == "Pendiente" ? 'selected' : '' }}>Pendiente</option>
                <option value="Cancelada" {{ $reservas->estado == "Cancelada" ? 'selected' : '' }}>Cancelada</option>
            </select>
        </div>

        <div class="form-group">
            <label class="letras1" for="precio_total">Precio:</label>
            <input class="celda" style=" margin-left: 20px;"  type="number" id="precio_total" name="precio_total" step="0.01" value="{{ $reservas->precio_total }}">
        </div>

        <button class="button1" type="submit">Editar</button>
    </form>
    </div>
    </div>
@endsection
