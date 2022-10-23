<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar</title>
</head>
<body>
    <h1>Detalle del tanque</h1>

    <h2>{{ $tank->name }}</h2>
    <h2>{{ $tank->country }}</h2>
    <h2>{{ $tank->category }}</h2>
    <br>
    <a href="/tank">Regresar al listado</a>
</body>
</html>