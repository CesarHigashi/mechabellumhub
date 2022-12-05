<x-plantilla titulo="Listado de Tanques">
    <x-header/>

    <!-- Botón para agregar vehiculos, se le muestra sólo a usuarios registrados -->
    @if(\Auth::user() != null)
        <div class="collapse navbar-collapse" id="upmenu">
            <ul class="nav navbar-nav" id="navbarontop">
                    <button onclick="location.href='/tank/create'" type="button"><span class="postnewcar">NUEVO TANQUE</span></button>
            </ul>
	    </div>
    @else
        <br><br>
    @endif

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('delete'))
        <div class="alert alert-danger" role="alert">
            {{ session('delete') }}
        </div>
    @endif
    
    @if(\Auth::user() != null)
        @if (\Auth::user()->rol == "admin")
            <!-- Esta seccion son botones para ver listados de todos los registros o solo los eliminados -->
            @if(request()->has('view_deleted'))
                <!-- En estas dos, el primero es para regresar al listado completo cuando estamos viendo los registros eliminados -->
                <a href="{{ route('tank.index') }}">Ver todos los tanques</a>
                <!-- El segundo es para restaurar todo lo eliminado de ese modelo -->
                <!-- <a href="{{ route('tank.restore.all') }}">Restaurar todo</a> -->
            @else
                <!-- Este es para ver los registros eliminados -->
                <a href="{{ route('tank.index', ['view_deleted' => 'DeletedRecords'])}}">Ver registros eliminados</a>
            @endif
        @endif
    @endif    
    <!-- Botón a la API, sólo lo ve el admin -->
    @if(\Auth::user() != null)
        @if (\Auth::user()->rol == "admin")
            <a href="/api/tanks">Ver API</a>
        @endif
    @else
        <br><br>
    @endif
    

    <!-- <a href="/tank/create">Ir a formulario</a> -->

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>País</th>
            <th>Editar</th>
            <!-- Condicional para ver que header se muestra -->
            @if(request()->has('view_deleted'))
                <th>Restaurar</th>
            @else
                <th>Eliminar</th>
            @endif
        </tr>
        @foreach ($tanks as $tank)
            <tr>
                <td>
                    <a href="/tank/{{ $tank->id }}">{{ $tank->name }}</a>
                </td>
                <td>{{ $tank->nations->name }}</td>
                <td>
                    <a href="/tank/{{ $tank->id }}/edit">Editar</a>
                </td>
                <td>
                    <!-- Condicional para ver que boton de accion se muestra -->
                    @if(request()->has('view_deleted'))
                        <!-- muestra restaurar, restaura un solo registro -->
                        <a href="{{ route('tank.restore', $tank->id) }}">Restaurar</a>
                    @else
                        <!-- muestra el boton de eliminar -->
                        <form action="/tank/{{ $tank->id }}" method="POST">
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

    @if(request()->has('view_deleted'))
        <br>
    @else
        <!-- GALERIA DE VEHICULOS | ¿PROVISIONAL? -->

        <div class="latestcars">
            <h1 class="text-center">&bullet; TANQUES &bullet;</h1>
        </div>

        <div class="grid">
            <div class="row">
                @foreach ($tanks as $tank)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="txthover">
                            <img src="{{ \Storage::url($tank->image->location)}}" alt="Tanque">
                            <div class="txtcontent">
                                <div class="stars"></div>
                                <div class="simpletxt">
                                    <h3 class="name">{{ $tank->name }} </h3>
                                    <p> {{ $tank->nations->name }} </p>
                                    <h4 class="price"> {{ $tank->category }} </h4>
                                    <a class="" href="/tank/{{ $tank->id }}">LEER MÁS</a><br>    
                                </div>
                            </div>
                        </div>	 
                    </div>
                @endforeach
            </div>	 
        </div>
    @endif

    
</x-plantilla>