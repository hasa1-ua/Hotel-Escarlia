@extends('layoutRecepcionista')

@section('contenido')
<style>
    h1{
        font-size: 50px;
    }
    .form-container {
        margin-top: 20px;
        width: 99%;
        background: #000000;
        border-color: #C3BB38;
        border-width: 1px;
        border-style: solid;
        padding: 20px;
        color: #C3BB38;
        font-family: "Solitreo";
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .form-group {
        margin-bottom: 15px;
        width: 48%;
        font-size: 32px;

    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input, .form-group select {
        width: 100%;
        padding: 8px;
        border: 1px solid #C3BB38;
        border-radius: 5px;
        background: #000000;
        color: #C3BB38;
        font-family: "Solitreo";
        font-size: 26px;
    }

    .form-group button {
        background: #840705;
        color: #C3BB38;
        border: 1px solid #C3BB38;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        width: 100%;
    }

    .form-group button:hover {
        background: #C3BB38;
        color: #000000;
    }

    /* Añadimos separación entre los elementos si el contenedor tiene más de un hijo */
    .form-container > .form-group:nth-child(even) {
        margin-left: 2%;
    }

    /* Establecer que el formulario ocupe el 100% de su contenedor */
    form {
        width: 100%;
    }

    .form-row {
        display: flex;
        justify-content: space-between;
    }

    .form-column {
        flex: 0 0 48%;
    }

    button{
        font-size: 20px;
    }
</style>

<div class="form-container">
    <h1>Editar Reserva</h1>
    @if ($errors->any())
        <div style="color: red; font-weight: bold; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservas.actualizar', ['id' => $reserva->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-column">
                <div class="form-group">
                    <label for="fecha_inicio">Fecha de Inicio</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" value="{{ $reserva->fecha_inicio }}" required>
                </div>

                <div class="form-group">
                    <label for="fecha_fin">Fecha de Fin</label>
                    <input type="date" id="fecha_fin" name="fecha_fin" value="{{ $reserva->fecha_fin }}" required>
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado" required>
                        <option value="Pendiente" {{ $reserva->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="Confirmada" {{ $reserva->estado == 'Confirmada' ? 'selected' : '' }}>Confirmada</option>
                        <option value="Cancelada" {{ $reserva->estado == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="precio_total">Precio Total (€)</label>
                    <input type="number" id="precio_total" name="precio_total" value="{{ $reserva->precio_total }}" step="0.01" required>
                </div>
            </div>

            <div class="form-column">
                <div class="form-group">
                    <label for="usuario_id">Usuario</label>
                    <select id="usuario_id" name="usuario_id" required>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" {{ $usuario->id == $reserva->usuario_id ? 'selected' : '' }}>
                                {{ $usuario->nombre_usuario }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="habitacion_id">Habitación</label>
                    <select id="habitacion_id" name="habitacion_id">
                        <option value="">Seleccione una habitación (opcional)</option>
                        @foreach ($habitaciones as $habitacion)
                            <option value="{{ $habitacion->id }}" {{ $habitacion->id == $reserva->habitacion_id ? 'selected' : '' }}>
                                Habitación {{ $habitacion->numero }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="sala_id">Sala</label>
                    <select id="sala_id" name="sala_id">
                        <option value="">Seleccione una sala (opcional)</option>
                        @foreach ($salas as $sala)
                            <option value="{{ $sala->id }}" {{ $sala->id == $reserva->sala_id ? 'selected' : '' }}>
                                {{ $sala->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit">Actualizar Reserva</button>
        </div>
    </form>
</div>
@endsection
