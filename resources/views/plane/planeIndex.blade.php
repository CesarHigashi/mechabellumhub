<x-plantilla titulo="Listado de Aviones">
    <x-header/>

    <!-- Botón para agregar vehiculos, se le muestra sólo a usuarios registrados -->
    @if(\Auth::user() != null)
        <div class="text-center">
            <ul class="center" id="navbarontop">
                    <button onclick="location.href='/plane/create'" type="button"><span class="postnewcar">NUEVO AVIÓN</span></button>
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
                <a href="{{ route('plane.index') }}">Ver todos los aviones</a>
                <!-- El segundo es para restaurar todo lo eliminado de ese modelo -->
                <!-- <a href="{{ route('plane.restore.all') }}">Restaurar todo</a> -->
            @else
                <!-- Este es para ver los registros eliminados -->
                <a href="{{ route('plane.index', ['view_deleted' => 'DeletedRecords'])}}">Ver registros eliminados</a>
            @endif
        @endif
    @endif
    <!-- Botón a la API, sólo lo ve el admin -->
    @if(\Auth::user() != null)
        @if (\Auth::user()->rol == "admin")
            <a href="/api/planes">Ver API</a>
        @endif
    @else
        <br><br>
    @endif
    
    <!-- <a href="/plane/create">Ir a formulario</a> -->

    @if(\Auth::user() != null)
        @if (\Auth::user()->rol == "admin")
            <div class="table-responsive">
                <table class="table">
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
                    @foreach ($planes as $plane)
                        <tr>
                            <td>
                                <a href="/plane/{{ $plane->id }}">{{ $plane->name }}</a>
                            </td>
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
            </div>
        @endif
    @endif

    <ul>
        
    </ul>

    @if(request()->has('view_deleted'))
        <br>
    @else
    <!-- GALERIA DE VEHICULOS | ¿PROVISIONAL? -->

        <div class="latestcars">
            <h1 class="text-center">&bullet; AVIONES &bullet;</h1>
        </div>

        <div class="grid">
            <div class="row">
                @foreach ($planes as $plane)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="txthover">
                            <img width="400" height="400" src="{{ \Storage::url($plane->image->location)}}" alt="Avión">
                            <div class="txtcontent">
                                <div class="stars"></div>
                                <div class="simpletxt">
                                    <h3 class="name">{{ $plane->name }} </h3>
                                    <p> {{ $plane->nations->name }} </p>
                                    <h4 class="price"> {{ $plane->category }} </h4>    
                                </div>
                            </div>
                        </div>	 
                    </div>
                @endforeach
            </div>	 
        </div>
    @endif
</x-plantilla>