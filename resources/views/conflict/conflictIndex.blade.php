<x-plantilla titulo="Listado de Conflictos">
    <x-header/>

    <div class="collapse navbar-collapse" id="upmenu">
	    <ul class="nav navbar-nav" id="navbarontop">
			<!-- Titulo de botón PROVISIONAL -->
			<button onclick="location.href='/conflict/create'" type="button"><span class="postnewcar">AÑADIR CONFLICTO</span></button>
		</ul>
	</div>

    <a href="/conflict/create">Ir a formulario</a>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Inicio</th>
            <th>Final</th>
            <th>Editar</th>
            <th>Eliminar</th>
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
                    <form action="/conflict/{{ $conflict->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Borrar">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

</x-plantilla>