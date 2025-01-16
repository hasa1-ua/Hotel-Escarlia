
<style>


.titulo {
  color: #C3BB38;
  font-family: "Yellowtail";
  font-weight: 300;
  font-size: 72px;
  text-align: center;
}


.tabla-tipo {
  margin-left: auto;
  margin-top: 20px;
  width: 1200px;
  background-color: #f2f2f2;
  border-width: 1px;
  border-style: solid;
  height: auto; /* Permite que la altura se ajuste al contenido */
}


.casilla {
  width: auto;
  padding: 8px 8px 50px 8px;
  background: #000000;
  border-color: #C3BB38;
  border-width: 1px;
  border-style: solid;
  height: auto; /* Permite que la altura se ajuste al contenido */
}


table {
    background-color: white;
    border-collapse: collapse;
    width: 100%;
    border: 1px solid black; /* Borde general de la tabla */
    margin: auto;
}

th, td {
    border: 1px solid black; /* Bordes de las celdas */
    padding: 8px;
    text-align: center; /* Centra el contenido */
    font-size: 18px; /* Ajusta el tamaño del texto */
}

th {
    background-color: #C0C0C0;
    text-align: center;
}



td.breakword {
    word-wrap: break-word;       /* Permite que las palabras largas se dividan en varias líneas */
    white-space: normal;         /* Permite que el texto se ajuste a varias líneas */
    max-width: 250px;            /* Puedes ajustar el ancho máximo de la celda */
    height: auto;                /* Permite que la celda crezca según el contenido */
}

.button1{
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
    margin-left: 30px;
}

.separation {
    text-align: left;
    margin-top: 30px;
    margin-left: 100px;
    display: flex;
}

img{
    width: 100px;
    height: 100px;
}

.filtro{
    margin-left: 20px;
}

</style>


@extends('layoutWebmaster')

@section('contenido')


<body>
    <div class="table-container">
    <!-- Listado tipo sala -->
    <div class="casilla">
    <h1 class="Titulo">Tipos de Sala</h1>
    <div class="separation">
        <button class="button1" onclick="window.location.href='/Webmaster/salas-de-conferencia/tiposala/crear';">Crear</button>
    </div>
    <table class="tabla-tipo">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Aforo</th>
                <th>Imagen</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($tipo_salas as $tiposala)
            <tr onclick="window.location.href='/Webmaster/salas-de-conferencia/tiposala/editar/{{$tiposala->id}}';" style="cursor: pointer;">
                    <!-- Realizar vista descripcion y añadir una columna mas para verla-->
                    <!-- Añadir añadir, editar y borrar-->
                    <td>{{ $tiposala->id }}</td>
                    <td>{{ $tiposala->nombre }}</td>
                    <td>{{ $tiposala->descripcion ?: 'Sin descripción' }}</td>
                    <td>{{number_format($tiposala->getPrecio(), 2)}}€</td>
                    <td>{{ $tiposala->aforo }}</td>
                    <td> <img src="{{ asset($tiposala->img) }}"></td>
                    <td>
                        <!-- Formulario para eliminar -->
                        <form action="/Webmaster/salas-de-conferencia/tiposala/{{ $tiposala->id }}" method="POST" style="display: inline;" onclick="event.stopPropagation();">
                         @csrf
                         @method('DELETE') <!-- Esto indica que la solicitud es de tipo DELETE -->

                            <!-- Botón de eliminación con confirmación -->
                            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este tipo de sala? Si lo haces tambien eliminaras las salas que tiene ese tipo');">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 50 50">
                                    <path d="M 21 2 C 19.354545 2 18 3.3545455 18 5 L 18 7 L 8 7 A 1.0001 1.0001 0 1 0 8 9 L 9 9 L 9 45 C 9 46.654 10.346 48 12 48 L 38 48 C 39.654 48 41 46.654 41 45 L 41 9 L 42 9 A 1.0001 1.0001 0 1 0 42 7 L 32 7 L 32 5 C 32 3.3545455 30.645455 2 29 2 L 21 2 z M 21 4 L 29 4 C 29.554545 4 30 4.4454545 30 5 L 30 7 L 20 7 L 20 5 C 20 4.4454545 20.445455 4 21 4 z M 19 14 C 19.552 14 20 14.448 20 15 L 20 40 C 20 40.553 19.552 41 19 41 C 18.448 41 18 40.553 18 40 L 18 15 C 18 14.448 18.448 14 19 14 z M 25 14 C 25.552 14 26 14.448 26 15 L 26 40 C 26 40.553 25.552 41 25 41 C 24.448 41 24 40.553 24 40 L 24 15 C 24 14.448 24.448 14 25 14 z M 31 14 C 31.553 14 32 14.448 32 15 L 32 40 C 32 40.553 31.553 41 31 41 C 30.447 41 30 40.553 30 40 L 30 15 C 30 14.448 30.447 14 31 14 z"></path>
                                </svg>
                            </button>
                        </form>
                </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay registros disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div>
        @include('paginate.personalpaginate', ['paginable' => $tipo_salas])
    </div>
    </div>

    <!-- Listado tipo sala -->
    <div class="casilla" style="margin-top: 20px;">
    <h1 class="Titulo">Salas</h1>
    <div class="separation">
        <button class="button1" onclick="window.location.href='/Webmaster/salas-de-conferencia/sala/crear';">Crear</button>
        <form class="filtro" method="GET" action="{{ url('/Webmaster/salas-de-conferencia') }}">
        <!-- Filtro para disponible y no disponible -->
        <select name="disponible" class="button1">
            <option value="">Seleccionar disponibilidad</option>
            <option value="1" {{ request()->get('disponible') == '1' ? 'selected' : '' }}>Disponible</option>
            <option value="0" {{ request()->get('disponible') == '0' ? 'selected' : '' }}>No disponible</option>
        </select>
        <button type="submit" class="button1">Filtrar</button>
        </form>
    </div>
    <table class="tabla-tipo">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Disponible</th>
                <th>TipoSala</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($salas as $sala)
                <tr onclick="window.location.href='/Webmaster/salas-de-conferencia/sala/editar/{{$sala->id}}';"  style="cursor: pointer;">
                    <!-- Realizar vista descripcion y añadir una columna mas para verla-->
                    <!-- Añadir añadir, editar y borrar-->
                    <td>{{ $sala->id }}</td>
                    <td>{{ $sala->nombre }}</td>
                    <td @if($sala->disponible == 1) style="color: green;" @else style="color: red;" @endif>
                        @if ($sala->disponible == 1)
                            Disponible
                        @else
                            No disponible
                        @endif
                    </td>
                    <td>{{ $sala->tipoSala->nombre}}</td>

                    <td>
                        <!-- Formulario para eliminar -->
                        <form action="/Webmaster/salas-de-conferencia/sala/{{ $sala->id }}" method="POST" style="display: inline;" onclick="event.stopPropagation();">
                         @csrf
                         @method('DELETE') <!-- Esto indica que la solicitud es de tipo DELETE -->

                            <!-- Botón de eliminación con confirmación -->
                            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta sala?');">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 50 50">
                                    <path d="M 21 2 C 19.354545 2 18 3.3545455 18 5 L 18 7 L 8 7 A 1.0001 1.0001 0 1 0 8 9 L 9 9 L 9 45 C 9 46.654 10.346 48 12 48 L 38 48 C 39.654 48 41 46.654 41 45 L 41 9 L 42 9 A 1.0001 1.0001 0 1 0 42 7 L 32 7 L 32 5 C 32 3.3545455 30.645455 2 29 2 L 21 2 z M 21 4 L 29 4 C 29.554545 4 30 4.4454545 30 5 L 30 7 L 20 7 L 20 5 C 20 4.4454545 20.445455 4 21 4 z M 19 14 C 19.552 14 20 14.448 20 15 L 20 40 C 20 40.553 19.552 41 19 41 C 18.448 41 18 40.553 18 40 L 18 15 C 18 14.448 18.448 14 19 14 z M 25 14 C 25.552 14 26 14.448 26 15 L 26 40 C 26 40.553 25.552 41 25 41 C 24.448 41 24 40.553 24 40 L 24 15 C 24 14.448 24.448 14 25 14 z M 31 14 C 31.553 14 32 14.448 32 15 L 32 40 C 32 40.553 31.553 41 31 41 C 30.447 41 30 40.553 30 40 L 30 15 C 30 14.448 30.447 14 31 14 z"></path>
                                </svg>
                            </button>
                        </form>
                </td>

                    
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay registros disponibles.</td>
                </tr>
                
            @endforelse
        </tbody>
    </table>   
    <div>
        @include('paginate.personalpaginate', ['paginable' => $salas])
    </div>
    
    
    </div>
    </div>
    
</body>





@endsection