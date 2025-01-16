@extends('layoutWebmaster')

@section('contenido')

<style>
.titulo {
  color: #C3BB38;
  font-family: "Yellowtail";
  font-weight: 300;
  font-size: 72px;
  text-align: center;
}

.tabla-habitacion {
  margin-left: auto;
  margin-top: 20px;
  width: 1200px;
  background-color: #f2f2f2;
  border-width: 1px;
  border-style: solid;
}

.casilla {
  width: 1420px;
  padding: 8px;
  background: #000000;
  border-color: #C3BB38;
  border-width: 1px;
  border-style: solid;
}

table {
  background-color: white;
  border-collapse: collapse;
  width: 100%;
  border: 1px solid black;
  margin: auto;
}

th, td {
  border: 1px solid black;
  padding: 8px;
  text-align: center;
  font-size: 18px;
}

th {
  background-color: #C0C0C0;
}

.button1 {
  display: inline-block;
  padding: 5px 10px;
  background-color: #840705;
  color: #C3BB38;
  border-color: #C3BB38;
  border: 1px solid;
  text-decoration: none;
  font-size: 40px;
  border-radius: 4px;
  font-family: "Solitreo";
  margin-left: 20px;
}

.separation {
  text-align: left;
  margin-top: 30px;
  margin-left: 100px;
  display: flex;
}

img {
  width: 100px;
  height: 100px;
}

.filtro {
  margin-left: 20px;
}
</style>

<body>
<div class="table-container">
  <div class="casilla">
    <h1 class="titulo">Listado de Habitaciones</h1>
    <div class="separation">
      <button class="button1" onclick="window.location.href='/Webmaster/habitaciones/crear';">Crear Habitación</button>
    </div>

    <table class="tabla-habitacion">
      <thead>
        <tr>
          <th>ID</th>
          <th>Número</th>
          <th>Planta</th>
          <th>Vistas</th>
          <th>Disponible</th>
          <th>Tipo de Habitación</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($habitaciones as $habitacion)
          <tr onclick="window.location.href='/Webmaster/habitaciones/editar/{{ $habitacion->id }}';" style="cursor: pointer;">
            <td>{{ $habitacion->id }}</td>
            <td>{{ $habitacion->getNumero() }}</td>
            <td>{{ $habitacion->getPlanta() }}</td>
            <td>{{ $habitacion->getVistas() }}</td>
            <td>{{ $habitacion->getDisponible() ? 'Sí' : 'No' }}</td>
            <td>{{ $habitacion->tipo->nombre ?? 'Sin tipo' }}</td>
            <td>
              <!-- Botón Editar -->
              <a href="/Webmaster/habitaciones/editar/{{ $habitacion->id }}" class="button1">Editar</a>

              <!-- Formulario eliminar -->
              <form action="/Webmaster/habitaciones/{{ $habitacion->id }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="button1" onclick="return confirm('¿Estás seguro de eliminar esta habitación?')">Eliminar</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7">No hay habitaciones registradas.</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    <div>
      @include('paginate.personalpaginate', ['paginable' => $habitaciones])
    </div>
  </div>
</div>
</body>

@endsection
