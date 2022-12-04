<x-plantilla titulo="Listado de Aviones">
    <x-header/>

    <!-- Botón para agregar vehiculos, se le muestra sólo a usuarios registrados -->
    @if(\Auth::user() != null)
        <div class="collapse navbar-collapse" id="upmenu">
            <ul class="nav navbar-nav" id="navbarontop">
                    <button onclick="location.href='/plane/create'" type="button"><span class="postnewcar">NUEVO AVIÓN</span></button>
            </ul>
	    </div>
    @else
        <br><br>
    @endif

    <!-- Esta seccion son botones para ver listados de todos los registros o solo los eliminados -->
    @if(request()->has('view_deleted'))
        <!-- En estas dos, el primero es para regresar al listado completo cuando estamos viendo los registros eliminados -->
        <a href="{{ route('plane.index') }}">Ver todos los aviones</a>
        <!-- El segundo es para restaurar todo lo eliminado de ese modelo -->
        <a href="{{ route('plane.restore.all') }}">Restaurar todo</a>
    @else
        <!-- Este es para ver los registros eliminados -->
        <a href="{{ route('plane.index', ['view_deleted' => 'DeletedRecords'])}}">Ver registros eliminados</a>
    @endif

    <a href="/plane/create">Ir a formulario</a>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>País</th>
            <th>Editar</th>
            <!-- Condicional para ver que header se muestra -->
            @if(request()->has('view_deleted'))
                <th>Restaurar</th>
            @else
                <th>Eliminar</th>
            @endif
        </tr>
        @foreach ($planes as $plane)
            <tr>
                <td>
                    <a href="/plane/{{ $plane->id }}">{{ $plane->name }}</a>
                </td>
                <td>{{ $plane->category }}</td>
                <td>{{ $plane->nations->name }}</td>
                <td>
                    <a href="/plane/{{ $plane->id }}/edit">Editar</a>
                </td>
                <td>
                    <!-- Condicional para ver que boton de accion se muestra -->
                    @if(request()->has('view_deleted'))
                        <!-- muestra restaurar, restaura un solo registro -->
                        <a href="{{ route('plane.restore', $plane->id) }}">Restaurar</a>
                    @else
                        <!-- muestra el boton de eliminar -->
                        <form action="/plane/{{ $plane->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Borrar">
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>

    <ul>
        
    </ul>

<!-- GALERIA DE VEHICULOS | ¿PROVISIONAL? -->

    <div class="latestcars">
        <h1 class="text-center">&bullet; AVIONES &bullet;</h1>
    </div>

    <div class="grid">
        <div class="row">
            @foreach ($planes as $plane)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="txthover">
                        <img src="/styles/image/B17.jpg" alt="B-17">
                        <div class="txtcontent">
                            <div class="stars"></div>
                            <div class="simpletxt">
                                <h3 class="name">{{ $plane->name }} </h3>
                                <p> {{ $plane->country }} </p>
                                <h4 class="price"> {{ $plane->category }} </h4>
                                <a class="" href="/plane/{{ $plane->id }}">LEER MÁS</a><br>    
                            </div>
                        </div>
                    </div>	 
                </div>
            @endforeach
        </div>	 
    </div>
</x-plantilla>