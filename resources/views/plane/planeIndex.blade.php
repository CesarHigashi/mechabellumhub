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

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>País</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        @foreach ($planes as $plane)
            <tr>
                <td>
                    <a href="/plane/{{ $plane->id }}">{{ $plane->name }}</a>
                </td>
                <td>{{ $plane->country }}</td>
                <td>
                    <a href="/plane/{{ $plane->id }}/edit">Editar</a>
                </td>
                <td>
                    <form action="/plane/{{ $plane->id }}" method="POST">
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