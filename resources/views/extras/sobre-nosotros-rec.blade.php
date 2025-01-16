<!DOCTYPE html>
@extends('layoutRecepcionista')
@section('contenido')
<html>
<head>
    <style>
        .container {
            background: #00000080;
            color: white;
            height: 80vh;
            align-items: center;
            justify-content: center;
            text-align: center;
            border-color: #C3BB38;
            border-width: 1px;
            border-style: solid;
            padding: 25px;
            border-radius: 10px;
            font-family: "Solitreo";
        }

        .title {
            color: #C3BB38;
            font-family: "Solitreo";
            font-weight: 300;
            font-size: 70px;
            text-align: center;
        }

        .columns {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .column {
            width: 48%;
        }

        .contact-info {
            font-size: 2em;
        }
        .contact-info p {
            margin: 10px 0;
        }

        .about-section {
            text-align: center;
            padding: 50px 20px;
            background-color: #ffffff20;
            color: white;
            border-color: #C3BB38;
            border-width: 1px;
            border-style: solid;
            padding: 25px;
            border-radius: 10px;
            font-family: "Solitreo";
        }

        .about-section h2 {
            font-size: 4em;
            margin-bottom: 20px;
            color: #C3BB38;
            font-family: "Solitreo";
        }

        .about-section p {
            font-size: 1.2em;
            max-width: 800px;
            margin: 0 auto;
            font-family: "Solitreo";
        }

        .photo {
            text-align: center;
        }
        .photo img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .sponsors {
            text-align: center;
            margin-top: 20px;
        }
        .sponsors img {
            max-width: 150px;
            margin: 10px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
            <h1 class="title">Hotel Escarlia</h1>
        </div>
        <div class="columns">
            <div class="column contact-info">
                <p>Email: info@hoteleescarlia.com</p>
                <p>Teléfono: +34 123 456 789</p>
                <p>X: <a href="https://x.com/hoteleescarlia" target="_blank">@hoteleescarlia</a></p>
                <p>Facebook: <a href="https://facebook.com/hoteleescarlia" target="_blank">Hotel Escarlia</a></p>
            </div>
            <div class="column photo">
                <img src="/imagenes/ubicacion_hotel.png" alt="Hotel Escarlia">
            </div>
        </div>
    </div>
    <div class="about-section">
        <h2>Asociaciones</h2>
        <img src="/imagenes/asociaciones.png" alt="Sponsors">
    </div>
</body>
</html>
@endsection