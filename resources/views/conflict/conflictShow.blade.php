<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar</title>
</head>
<body>
    <h1>Detalle de conflicto</h1>

    <h2>{{ $conflict->name }}</h2>
    <h3>Beligerantes: </h3>

    <ol>
        @foreach ($conflict->nations as $nation)
            <li>{{ $nation->name }} Capital: {{ $nation->capital }}</li>
        @endforeach
    </ol>
</body>
</html>