<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de aviones</title>
</head>
<body>
    <h1>Listado de aviones registrados</h1>

    <a href="/plane/create">Ir a formulario</a>

    <table>
        <tr>
            <th>Nombre</th>
        </tr>
        @foreach ($planes as $plane)
            <tr>
                <td>
                    <a href="/plane/{{ $plane->name}}">{{ $plane->name }}</a>
                </td>
            </tr>
        @endforeach
    </table>
    <ul>
        
    </ul>
</body>
</html>