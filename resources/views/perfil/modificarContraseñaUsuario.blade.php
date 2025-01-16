@extends('layoutUsuario')

@section('contenido')

<style>
    .formulario {
        margin-top: 10px;
        width: 600px;
        height: auto;
        background: #000000;
        border-color: #C3BB38;
        color: #C3BB38;
        font-family: "Solitreo";
        border-width: 1px;
        border-style: solid;
        padding: 20px;
        border-radius: 10px;
        margin-left: auto;
        margin-right: auto;
        font-size: 40px;
        text-align: center;
    }

    .formulario label {
        font-family: "Solitreo";
        font-size: 38px;
        color: #C3BB38;
        margin-bottom: 10px;
        display: block;
    }

    .formulario input {
        width: 75%;
        padding: 10px;
        font-size: 18px;
        margin-bottom: 20px;
        border: 1px solid #C3BB38;
        border-radius: 5px;
        background: #202020;
        color: #C3BB38;
    }

    .boton-guardar {
        text-align: center;
        margin-top: 20px;
    }

    .boton-guardar button {
        width: 280px;
        height: 120px;
        background: #840705;
        color: #C3BB38;
        border-color: #F4EB49;
        border-width: 1px;
        border-style: solid;
        border-radius: 3px;
        font-family: "Solitreo";
        font-size: 36px;
        cursor: pointer;
    }

    .boton-guardar button:hover {
        background: #A00000;
    }

    .error {
        color: red;
        font-size: 16px;
        margin-bottom: 10px;
        font-family: "Solitreo";
    }
</style>

<div class="formulario">
    <h3 class="titulo">Modificar Contraseña</h3>
    
    <form id="passwordForm" action="/Usuario/perfil/modificar-contraseña/{{$usuario->email}}" method="POST">
        @csrf
        <div id="error" class="error" style="display: none;"></div>
        <label for="current_password">Contraseña Actual:</label>
        <input type="password" id="current_password" name="current_password" required>
        
        <label for="new_password">Nueva Contraseña:</label>
        <input type="password" id="new_password" name="new_password" required>
        
        <label for="repeat_password">Repetir Nueva Contraseña:</label>
        <input type="password" id="repeat_password" name="repeat_password" required>
        
        <div class="boton-guardar">
            <button type="submit">Actualizar Contraseña</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('passwordForm').addEventListener('submit', async function(event) {
        event.preventDefault();

        const currentPassword = document.getElementById('current_password').value;
        const newPassword = document.getElementById('new_password').value;
        const repeatPassword = document.getElementById('repeat_password').value;
        const errorDiv = document.getElementById('error');

        // Limpiar mensajes de error previos
        errorDiv.style.display = 'none';
        errorDiv.innerText = '';

        // Validar nueva contraseña y confirmación en el cliente
        if (newPassword.length < 4) {
            errorDiv.style.display = 'block';
            errorDiv.innerText = 'La contraseña debe tener al menos 4 caracteres.';
            return;
        }
        if (newPassword !== repeatPassword) {
            errorDiv.style.display = 'block';
            errorDiv.innerText = 'Las contraseñas no coinciden.';
            return;
        }

        // Validar contraseña actual con el servidor
        try {
            const response = await fetch('/validar-contraseña-actual-Usuario', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify({ current_password: currentPassword })
            });
            const data = await response.json();

            if (!data.valid) {
                errorDiv.style.display = 'block';
                errorDiv.innerText = 'La contraseña actual no es correcta.';
            } else {
                this.submit(); // Enviar el formulario si todo es válido
            }
        } catch (error) {
            console.error('Error al validar la contraseña actual:', error);
            errorDiv.style.display = 'block';
            errorDiv.innerText = 'Ocurrió un error al validar la contraseña. Inténtelo nuevamente.';
        }
    });
</script>

@endsection
