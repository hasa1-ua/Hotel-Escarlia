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
        border-radius: 15px;
    }

    .form-row {
        display: flex;
        justify-content: space-between;
    }

    .column {
        width: 48%;
    }

    .form-group {
        margin-bottom: 15px;
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
        border-radius: 15px;
    }

    .form-group button {
        background: #840705;
        color: #C3BB38;
        border: 1px solid #C3BB38;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 15px;
    }

    .form-group button:hover {
        background: #C3BB38;
        color: #000000;
    }

    button{
        font-size: 20px;
    }
</style>

<div class="form-container">
    <h1>Crear Reserva</h1>
    <!-- Mostrar errores generales -->
    @if ($errors->has('general'))
        <div style="color: red; font-weight: bold; margin-bottom: 15px;">
            {{ $errors->first('general') }}
        </div>
    @endif
    <form action="{{ route('reservas.guardar') }}" method="POST">
        @csrf
        <div class="form-row">
            <!-- Primera columna -->
            <div class="column">
                <div class="form-group">
                    <label for="fecha_inicio">Fecha de Inicio</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" required>
                </div>
                <div class="form-group">
                    <label for="fecha_fin">Fecha de Fin</label>
                    <input type="date" id="fecha_fin" name="fecha_fin" required>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input id="estado" name="estado" value="Pendiente" readonly>
                </div>
                <div class="form-group">
                    <label for="precio_total">Precio Total (€)</label>
                    <input type="number" id="precio_total" name="precio_total" step="0.01" required>
                </div>
            </div>
            <!-- Segunda columna -->
            <div class="column">
                <div class="form-group">
                    <label for="usuario_id">Usuario</label>
                    <select id="usuario_id" name="usuario_id" required>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->nombre_usuario }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="habitacion_id">Habitación</label>
                    <select id="habitacion_id" name="habitacion_id">
                        <option value="">Seleccione una habitación (opcional)</option>
                        @foreach ($habitaciones as $habitacion)
                            <option value="{{ $habitacion->id }}">Habitación {{ $habitacion->numero }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sala_id">Sala</label>
                    <select id="sala_id" name="sala_id">
                        <option value="">Seleccione una sala (opcional)</option>
                        @foreach ($salas as $sala)
                            <option value="{{ $sala->id }}">{{ $sala->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit">Guardar Reserva</button>
        </div>
    </form>
</div>
@endsection
