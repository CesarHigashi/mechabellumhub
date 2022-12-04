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
    
    <a href="/tank/create">Ir a formulario</a>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>País</th>
            <th>Editar</th>
            <th>Eliminar</th>
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
                    <form action="/tank/{{ $tank->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Borrar">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <ul>

    </ul>

    <!-- GALERIA DE VEHICULOS | ¿PROVISIONAL? -->

    <div class="latestcars">
        <h1 class="text-center">&bullet; TANQUES &bullet;</h1>
    </div>

    <div class="grid">
        <div class="row">
            @foreach ($tanks as $tank)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="txthover">
                        <img src="/styles/image/M4-Sherman.png" alt="M4-Sherman">
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
</x-plantilla>