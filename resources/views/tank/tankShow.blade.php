<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Tanque</title>

    <!-- RUTAS Y ESTILOS PROVISIONALES-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/styles/source/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/styles/source/font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="/styles/style/slider.css">
	<link rel="stylesheet" type="text/css" href="/styles/style/mystyle.css">
	<link rel="stylesheet" type="text/css" href="/styles/style/formstyle.css">

</head>
<body>

    <img src="{{ \Storage::url($tank->image->location)}}" alt="Tanque">

    <div class="form-group group-coustume">
        <h1>Detalles del tanque</h1>

        <h4> <strong>Nombre del tanque: </strong> <br> {{ $tank->name }}</h4>
        <h4> <strong>País de origen: </strong> <br> {{ $tank->nations->name }}</h4>
        <h4> <strong>Año de fabricación: </strong> <br> {{ $tank->year }}</h4>
        <h4> <strong>Categoría: </strong> <br> {{ $tank->category }}</h4>
        <h4> <strong>Calibre del cañón (mm): </strong> <br> {{ $tank->caliber_mm }}</h4>
        <h4> <strong>Tripulación: </strong> <br> {{ $tank->crew }}</h4>
        <h4> <strong>Velocidad máxima (km/h): </strong> <br> {{ $tank->max_speed_kmh }}</h4>
        <h4> <strong>Peso (kg): </strong> <br> {{ $tank->weight_kg }}</h4>
        <h4> <strong>Descripción: </strong> <br> {{ $tank->description }}</h4>
        <br>
        <a href="/tank">Regresar al listado</a>
    </div>

</body>
</html>