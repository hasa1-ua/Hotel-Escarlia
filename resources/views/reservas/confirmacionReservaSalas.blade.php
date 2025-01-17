@extends('layoutUsuario')

@section('contenido')

<style>
.container {
    width: 80%;
    margin: 50px auto;
    padding: 30px;
    background-color: #000000;
    border: 2px solid #C3BB38;
    border-radius: 10px;
    color: #C3BB38;
    font-family: "Solitreo";
    text-align: center;
}

h1 {
    font-size: 48px;
    margin-bottom: 20px;
}

h3, p {
    font-size: 28px;
    margin: 10px 0;
}

.button-container {
    margin-top: 30px;
}

.button1 {
    width: 200px;
    height: 60px;
    background-color: #840705;
    color: #C3BB38;
    border: 2px solid #C3BB38;
    font-size: 24px;
    border-radius: 5px;
    cursor: pointer;
}
</style>

<div class="container">
    <h1>¡Gracias por reservar una de nuestras salas!</h1>
    <h3>Aquí tienes un resumen de tu reserva:</h3>

    <p><strong>Nombre de la Sala:</strong> {{ $sala->nombre }}</p>
    <p><strong>Coordinador:</strong> {{ $reserva->user->name ?? 'Sin asignar' }}</p>
    <p><strong>Aforo:</strong> {{ $sala->tipoSala->aforo }}</p>

    <p><strong>Fecha de Inicio:</strong> {{ \Carbon\Carbon::parse($reserva->fecha_inicio)->format('d/m/Y') }}</p>
    <p><strong>Fecha de Fin:</strong> {{ \Carbon\Carbon::parse($reserva->fecha_fin)->format('d/m/Y') }}</p>
    <p><strong>Precio de la Sala:</strong> {{ number_format($reserva->precio_total, 2) }}€</p>

    <p><em>Recibirá un comprobante de su reserva en su correo electrónico.</em></p>

    <div class="button-container">
        <button onclick="window.location.href='/Usuario/salas-de-conferencia';" class="button1">Volver a Salas</button>
    </div>
</div>

@endsection
