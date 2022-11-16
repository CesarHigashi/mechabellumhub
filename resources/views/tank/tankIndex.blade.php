<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de tanques</title>

    <!-- RUTAS Y ESTILOS PROVISIONALES-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/styles/source/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/styles/source/font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="/styles/style/slider.css">
	<link rel="stylesheet" type="text/css" href="/styles/style/mystyle.css">
	<link rel="stylesheet" type="text/css" href="/styles/style/formstyle.css">

</head>
<body>
    <h1>Listado de tanques registrados</h1>

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
                <td>{{ $tank->country }}</td>
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
</body>
</html>

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
                            <p> {{ $tank->country }} </p>
                            <h4 class="price"> {{ $tank->category }} </h4>
                            <a class="" href="/tank/{{ $tank->id }}">LEER MÁS</a><br>    
                        </div>
                    </div>
                </div>	 
            </div>
        @endforeach
    </div>	 
</div>