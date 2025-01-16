@extends('layoutRecepcionista')

@section('contenido')
<style>
    .container {
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

    table {
        width: 100%;
        margin-top: 20px;
        font-size: 24px;
    }

    table th, table td {
        border: 1px solid #C3BB38;
        padding: 10px;
        text-align: center;
    }

    table th {
        background-color: #840705;
        color: #C3BB38;
    }

    .button {
        background: #840705;
        color: #C3BB38;
        border: 1px solid #C3BB38;
        border-radius: 5px;
        padding: 5px;
        cursor: pointer;
        font-size: 24px;
        text-decoration: none;
        border-radius: 10px;
    }

    .button:hover {
        background: #C3BB38;
        color: #000000;
    }

    .create-button-container {
        display: flex;
        justify-content: flex-start;
        margin-top: 20px;
    }

    .create-button {
        background: #840705;
        color: #C3BB38;
        border: 1px solid #C3BB38;
        border-radius: 5px;
        padding: 10px 20px;
        text-decoration: none;
        font-family: "Solitreo";
        font-size: 32px;
        border-radius: 20px;
    }

    .create-button:hover {
        background: #C3BB38;
        color: #000000;
    }
</style>

<div class="container">
    <h1>Listado de Reservas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
                <th>Estado</th>
                <th>Precio Total</th>
                <th>Cupon</th>
                <th>Usuario</th>
                <th>Habitación/Sala</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->getId() }}</td>
                    <td>{{ $reserva->getFechaInicio() }}</td>
                    <td>{{ $reserva->getFechaFin() }}</td>
                    <td>{{ $reserva->getEstado() }}</td>
                    <td>{{ $reserva->getPrecioTotal() }}€</td>
                    <td>
                        @if ($reserva->cupon == null)
                            Sin cupón
                        @else
                            {{ $reserva->cupon->descuento }}
                        @endif
                    </td>
                    <td>{{ $reserva->usuario->nombre_usuario }}</td>
                    <td>
                        @if ($reserva->habitacion && !$reserva->sala)
                            Habitación {{ $reserva->habitacion->numero }}
                        @else
                            {{ $reserva->sala->nombre }}
                        @endif
                    </td>
                    <td>
                        <button onclick="window.location.href='/Recepcionista/reservas/editar/{{$reserva->id}}';" class="button">Editar</button>
                        <form action="/Recepcionista/reservas/borrar/{{$reserva->id}}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="button">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        @include('paginate.personalpaginate', ['paginable' => $reservas])
    </div>

    <div class="create-button-container">
        <a href= "{{ route('reservas.crear') }}" class="create-button">Crear Reserva</a>
    </div>
</div>
@endsection
