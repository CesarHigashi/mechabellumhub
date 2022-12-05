<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de avión</title>

    <!-- RUTAS Y ESTILOS PROVISIONALES-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/styles/source/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/styles/source/font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="/styles/style/slider.css">
	<link rel="stylesheet" type="text/css" href="/styles/style/mystyle.css">
	<link rel="stylesheet" type="text/css" href="/styles/style/formstyle.css">

</head>
<body>

    <img src="{{ \Storage::url($plane->image->location)}}" alt="Avión">

    <div class="form-group group-coustume">
        <h1>Detalle del avión</h1>  
        <h4> <strong> Nombre del avion: </strong> <br> {{ $plane->name }}</h4>
        <h4> <strong> País de origen: </strong> <br> {{ $plane->nations->name }}</h4>
        <h4> <strong> Categoria: </strong> <br> {{ $plane->category }}</h4>
        <h4> <strong> Año de fabricación: </strong> <br> {{ $plane->year }}</h4>
        <h4> <strong> Número de ametralladoras: </strong> <br> {{ $plane->machine_guns }}</h4>
        <h4> <strong> Número de cañones: </strong> <br> {{ $plane->cannons }}</h4>
        <h4> <strong> Número de torretas: </strong> <br> {{ $plane->turrets }}</h4>
        <h4> <strong> Altitud maxima de operación: </strong> <br> {{ $plane->max_height_m }} metros</h4>
        <h4> <strong> Cantidad de tripulantes: </strong> <br> {{ $plane->crew }}</h4>
        <h4> <strong> Velocidad maxima: </strong> <br> {{ $plane->max_speed_kmh }} km/h</h4>
        <h4> <strong> Peso: </strong> <br> {{ $plane->weight_kg }} kg</h4>
        <h4> <strong> Descripción: </strong> <br> {{ $plane->description }}</h4>
        <br>
        <a href="/plane">Regresar al listado</a>
    </div>
    
    
</body>
</html>