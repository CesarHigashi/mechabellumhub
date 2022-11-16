<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de aviones</title>

    <!-- RUTAS Y ESTILOS PROVISIONALES-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/styles/source/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/styles/source/font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="/styles/style/slider.css">
	<link rel="stylesheet" type="text/css" href="/styles/style/mystyle.css">
	<link rel="stylesheet" type="text/css" href="/styles/style/formstyle.css">
    
</head>
<body>
    <h1>Listado de aviones registrados</h1>

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
</body>
</html>

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