<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de tanques</title>
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