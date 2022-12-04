<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar</title>
</head>
<body>
    <h1>Detalles del tanque</h1>

    <h4>Nombre del tanque: {{ $tank->name }}</h4>
    <h4>País de origen: {{ $tank->country }}</h4>
    <h4>Año de fabricación: {{ $tank->year }}</h4>
    <h4>Categoría: {{ $tank->category }}</h4>
    <h4>Calibre del cañón (mm): {{ $tank->caliber_mm }}</h4>
    <h4>Tripulación: {{ $tank->crew }}</h4>
    <h4>Velocidad máxima (km/h): {{ $tank->max_speed_kmh }}</h4>
    <h4>Peso (kg): {{ $tank->weight_kg }}</h4>
    <h4>Descripción: {{ $tank->description }}</h4>
    <img src="{{ \Storage::url($tank->image->location)}}" alt="Tanque">
    <br>
    <a href="/tank">Regresar al listado</a>
</body>
</html>