<x-plantilla titulo="Listado de Conflictos">
    <x-header/>

    <!-- Botón para agregar conflictos, se le muestra sólo a usuarios registrados -->
    @if(\Auth::user() != null)
        <div class="collapse navbar-collapse" id="upmenu">
            <ul class="nav navbar-nav" id="navbarontop">
                <!-- Titulo de botón PROVISIONAL -->
                <button onclick="location.href='/conflict/create'" type="button"><span class="postnewcar">AÑADIR CONFLICTO</span></button>
            </ul>
        </div>
    @else
        <br><br>
    @endif

    <!-- Esta seccion son botones para ver listados de todos los registros o solo los eliminados -->
    @if(request()->has('view_deleted'))
        <!-- En estas dos, el primero es para regresar al listado completo cuando estamos viendo los registros eliminados -->
        <a href="{{ route('conflict.index') }}">Ver todos los conflictos</a>
        <!-- El segundo es para restaurar todo lo eliminado de ese modelo -->
        <a href="{{ route('conflict.restore.all') }}">Restaurar todo</a>
    @else
        <!-- Este es para ver los registros eliminados -->
        <a href="{{ route('conflict.index', ['view_deleted' => 'DeletedRecords'])}}">Ver registros eliminados</a>
    @endif

    <!-- ++++++++++++++++++++IMPORTANTE++++++++++++++++ -->
    <!-- Enlace a la API, metela en cosas de admin tambien -->
    <a href="/api/conflicts">Ver API</a>

    <!-- <a href="/conflict/create">Ir a formulario</a> -->

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Inicio</th>
            <th>Final</th>
            <th>Editar</th>
            <!-- Condicional para ver que header se muestra -->
            @if(request()->has('view_deleted'))
                <th>Restaurar</th>
            @else
                <th>Eliminar</th>
            @endif
        </tr>
        @foreach ($conflicts as $conflict)
            <tr>
                <td>
                    <a href="/conflict/{{ $conflict->id }}">{{ $conflict->name }}</a>
                </td>
                <td>{{ $conflict->start_year }}</td>
                <td>{{ $conflict->end_year }}</td>
                <td>
                    <a href="/conflict/{{ $conflict->id }}/edit">Editar</a>
                </td>
                <td>
                    <!-- Condicional para ver que boton de accion se muestra -->
                    @if(request()->has('view_deleted'))
                        <!-- muestra restaurar, restaura un solo registro -->
                        <a href="{{ route('conflict.restore', $conflict->id) }}">Restaurar</a>
                    @else
                        <!-- muestra el boton de eliminar -->
                        <form action="/conflict/{{ $conflict->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Borrar">
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>

</x-plantilla>