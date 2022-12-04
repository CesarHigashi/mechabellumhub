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

    <h2>{{ $conflict->name }} ({{ $conflict->start_year }} - {{ $conflict->end_year }})</h2>
    <h3>Beligerantes: </h3>

    <table border="1">
        <tr>
            <th>País</th>
            <th>Capital</th>
            <th>Continente</th>
        </tr>
        @foreach ($conflict->nations as $nation)
            <tr>
                <td>{{ $nation->name }}</td>
                <td>{{ $nation->capital }}</td>
                <td>{{ $nation->continent }}</td>
            </tr>
        @endforeach
    </table>


    <ol>
        
    </ol>

    <h4>{{ $conflict->description }}</h4>
    <a href="/conflict">Regresar al listado</a>
</body>
</html>