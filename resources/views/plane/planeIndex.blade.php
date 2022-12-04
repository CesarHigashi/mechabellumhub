<x-plantilla titulo="Listado de Aviones">
    <x-header/>

    <!-- Botón para agregar vehiculos, se le muestra sólo a usuarios registrados -->
    @if(\Auth::user() != null)
        <div class="collapse navbar-collapse" id="upmenu">
            <ul class="nav navbar-nav" id="navbarontop">
                    <button onclick="location.href='/tank/create'" type="button"><span class="postnewcar">NUEVO AVIÓN</span></button>
            </ul>
	    </div>
    @else
        <br><br>
    @endif

    <a href="/plane/create">Ir a formulario</a>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>País</th>
            <th>Editar</th>
            <th>Eliminar</th>
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
                    <form action="/plane/{{ $plane->id }}" method="POST">
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