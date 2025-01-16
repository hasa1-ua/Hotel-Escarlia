@extends('layoutPublico')
@section('contenido')
<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <style>
        .form-section {
            display: none;
        }
        .form-section.active {
            display: block;
        }

        .form-container {
            margin-top: 20px;
            width: 1390px;
            margin-left: -10px;
            height: auto;
            background: #000000;
            border-color: #C3BB38;
            border-width: 1px;
            border-style: solid;
            padding: 25px;
            border-radius: 10px;
        }

        .form-section label {
            font-family: "Solitreo";
            font-size: 40px;
            color: #C3BB38;
            margin-bottom: 10px;
            margin-left: 150px;
        }

        .form-section input {
            font-family: "Solitreo";
            width: 75%;
            padding: 10px;
            font-size: 40px;
            margin-bottom: 20px;
            border: 1px solid #C3BB38;
            border-radius: 5px;
            background: #5E0202;
            color: #C3BB38;
            margin-left: 150px;
        }

        .titulo {
            color: #C3BB38;
            font-family: "Solitreo";
            font-weight: 300;
            font-size: 70px;
            margin-bottom: 0px;
            margin-top: auto;
            text-align: center;
        }

        .btn {
            background: #840705;
            color: #C3BB38;
            border-color: #F4EB49;
            border-width: 1px;
            border-style: solid;
            border-radius: 3px;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 28px;
            font-family: "Solitreo";
            cursor: pointer;
            display: inline-block;
        }

        .btn2 {
            background: #84070500;
            color: #C3BB38;
            border-color: #F4EB4900;
            border-width: 1px;
            border-style: solid;
            border-radius: 3px;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 28px;
            font-family: "Solitreo";
            cursor: pointer;
            display: inline-block;
        }

        .btn button:hover {
            background: #A00000;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
    <script>
        function showSection(section) {
            document.querySelectorAll('.form-section').forEach(function (el) {
                el.classList.remove('active');
            });
            document.getElementById(section).classList.add('active');
        }

        function validateUser() {
            const email = document.getElementById('email').value;

            fetch('{{ route('validate-user') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ email: email })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Response data:', data); // Añadir mensaje de consola
                if (data.errors) {
                    if (data.errors.email) {
                        document.getElementById('email-error').innerText = data.errors.email[0];
                    } else {
                        document.getElementById('email-error').innerText = '';
                    }
                } else {
                    document.getElementById('email-error').innerText = '';
                    showSection('section2');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ocurrió un error al validar los datos. Por favor, inténtalo de nuevo.');
            });
        }

        function validatePasswords() {
            const password = document.getElementById('password').value;
            const passwordConfirmation = document.getElementById('password_confirmation').value;

            if (password !== passwordConfirmation) {
                document.getElementById('password-error').innerText = 'Las contraseñas no coinciden';
                return false;
            } else {
                document.getElementById('password-error').innerText = '';
                showSection('section3');
            }
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h1 class="titulo">Registro</h1>
        @if ($errors->any())
            <div class="error-container">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div id="section1" class="form-section active">
                    <div>
                        <label for="name">Nombre de Usuario:</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        <span id="email-error" class="error"></span>
                    </div>
                    <div class="button-container">
                        <button type="button" class="btn" onclick="validateUser()">Siguiente</button>
                    </div>
                </div>
                <div id="section2" class="form-section">
                    <div>
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div>
                        <label for="password_confirmation">Repetir Contraseña:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required>
                        <span id="password-error" class="error"></span>
                    </div>
                    <div class="button-container">
                        <button type="button" class="btn" onclick="showSection('section1')">Anterior</button>
                        <button type="button" class="btn" onclick="validatePasswords()">Siguiente</button>
                    </div>
                </div>
                <div id="section3" class="form-section">
                    <div>
                        <label for="fecha">Fecha de nacimiento:</label>
                        <input type="date" id="fecha" name="fecha">
                    </div>
                    <div>
                        <label for="telefono">Telefono:</label>
                        <input type="text" id="telefono" name="telefono">
                    </div>
                    <div class="button-container">
                        <button type="button" class="btn" onclick="showSection('section2')">Anterior</button>
                        <button type="button" class="btn" onclick="showSection('section4')">Siguiente</button>
                        <button type="button" class="btn2" onclick="showSection('section4')">Omitir</button>
                    </div>
                </div>
                <div id="section4" class="form-section">
                    <div>
                        <label for="address">Dirección:</label>
                        <input type="text" id="address" name="address" value="{{ old('address') }}">
                    </div>
                    <div>
                        <label for="nationality">Nacionalidad:</label>
                        <input type="text" id="nationality" name="nationality" value="{{ old('nationality') }}">
                    </div>
                    <div>
                        <label for="country">País de residencia:</label>
                        <input type="text" id="country" name="country" value="{{ old('country') }}">
                    </div>
                    <div class="button-container">
                        <button type="button" class="btn" onclick="showSection('section3')">Anterior</button>
                        <button type="submit" class="btn">Registrarse</button>
                        <button type="submit" class="btn2">Omitir</button>
                    </div>
                </div>
            </form>
    </div>
</body>
</html>
@endsection