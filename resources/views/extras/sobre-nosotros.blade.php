<!DOCTYPE html>
<html>
<head>
    <title>Sobre Nosotros</title>
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }
        .title {
            text-align: center;
            font-size: 2.5em;
            margin-bottom: 20px;
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
            font-size: 1.2em;
        }
        .contact-info p {
            margin: 10px 0;
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
        <h1 class="title">About Us</h1>
        <div class="columns">
            <div class="column contact-info">
                <p>Email: info@hoteleescarlia.com</p>
                <p>Teléfono: +34 123 456 789</p>
                <p>X: <a href="https://x.com/hoteleescarlia" target="_blank">@hoteleescarlia</a></p>
                <p>Facebook: <a href="https://facebook.com/hoteleescarlia" target="_blank">Hotel Escarlia</a></p>
            </div>
            <div class="column photo">
                <img src="/path/to/photo.jpg" alt="Hotel Escarlia">
            </div>
        </div>
        <div class="sponsors">
            <h2>Asociaciones/Patrocinadores</h2>
            <img src="/path/to/sponsor1.jpg" alt="Sponsor 1">
            <img src="/path/to/sponsor2.jpg" alt="Sponsor 2">
            <img src="/path/to/sponsor3.jpg" alt="Sponsor 3">
            <img src="/path/to/sponsor4.jpg" alt="Sponsor 4">
        </div>
    </div>
</body>
</html>