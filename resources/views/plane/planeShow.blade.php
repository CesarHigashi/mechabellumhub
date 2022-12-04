<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar</title>
</head>
<body>
    <h1>Detalle del avión</h1>

    <h4>Nombre del avion: {{ $plane->name }}</h4>
    <h4>País de origen: {{ $plane->country }}</h4>
    <h4>Categoria: {{ $plane->category }}</h4>
    <h4>Año de fabricación: {{ $plane->year }}</h4>
    <h4>Número de ametralladoras: {{ $plane->machine_guns }}</h4>
    <h4>Número de cañones{{ $plane->cannons }}</h4>
    <h4>Número de torretas: {{ $plane->turrets }}</h4>
    <h4>Altitud maxima de operación: {{ $plane->max_height_m }} metros</h4>
    <h4>Cantidad de tripulantes: {{ $plane->crew }}</h4>
    <h4>Velocidad maxima: {{ $plane->max_speed_kmh }} km/h</h4>
    <h4>Peso: {{ $plane->weight_kg }} kg</h4>
    <h4>Descripción: {{ $plane->description }}</h4>
    <img src="{{ \Storage::url($plane->image->location)}}" alt="Avión">
    <br>
    <a href="/plane">Regresar al listado</a>
</body>
</html>