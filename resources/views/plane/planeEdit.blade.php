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
    <div class = "create-form">
        <h1>Formulario de avión</h1>
        <div class="form-group group-coustume">
            <form action="/plane/{{$plane->id}}" method="POST"> <!-- {{route('plane.update', $plane)}} -->
                @csrf
                @method('patch')
                <label for="name">Nombre</label>
                <input class="form-control name-form" placeholder="Nombre del avión" type="text" name="name" id="name" value="{{ old('name') ?? $plane->name  }}">
                @error('name')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="year">Año</label>
                <input class="form-control name-form" placeholder="Año de creación" type="number" name="year" id="year" value="{{ old('year') ?? $plane->year }}">
                @error('year')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="nations_id">País de origen</label>
                <select name="nations_id" id="nations_id">
                    @foreach ($nations as $nation)
                        <option value="{{ $nation->id }}" @selected( old('nations_id') == $nation->id ?? $plane->nations_id == $nation->id)>{{ $nation->name }}</option>
                    @endforeach
                </select>
                @error('nations_id')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="machine_guns">Ametralladoras</label>
                <input class="form-control name-form" placeholder="Número de ametralladoras" type="number" name="machine_guns" id="machine_guns" value="{{ old('machine_guns') ?? $plane->machine_guns }}">
                @error('machine_guns')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="cannons">Cañones</label>
                <input class="form-control name-form" placeholder="Número de cañones" type="number" name="cannons" id="cannons" value="{{ old('cannons') ?? $plane->cannons }}">
                @error('cannons')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="turrets">Torretas</label>
                <input class="form-control name-form" placeholder="Número de torretas" type="number" name="turrets" id="turrets" value="{{ old('turrets') ?? $plane->turrets }}">
                @error('turrets')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="max_height_m">Operación maxima (metros)</label>
                <input class="form-control name-form" placeholder="Altura de operación maxima (metros)" type="number" name="max_height_m" id="max_height_m" value="{{ old('max_height_m') ?? $plane->max_height_m }}">
                @error('max_height_m')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="crew">Tripulación</label>
                <input class="form-control name-form" placeholder="Tripulación del avión" type="number" name="crew" id="crew" value="{{ old('crew') ?? $plane->crew }}">
                @error('crew')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="max_speed_kmh">Velocidad maxima</label>
                <input class="form-control name-form" placeholder="Velocidad máxima en km/h" type="number" name="max_speed_kmh" id="max_speed_kmh" value="{{ old('max_speed_kmh') ?? $plane->max_speed_kmh }}">
                @error('max_speed_kmh')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="weight_kg">Peso</label>
                <input class="form-control name-form" placeholder="Peso en kg" type="number" name="weight_kg" id="weight_kg" value="{{ old('weight_kg') ?? $plane->weight_kg }}">
                @error('weight_kg')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="category">Categoria</label>
                <input class="form-control name-form" placeholder="Categoría del avión" type="text" name="category" id="category" value="{{ old('category') ?? $plane->category }}">
                @error('category')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="description">Descripción</label>
                <textarea rows="4" cols="50" class="message-form" name="description" id="description"> {{ old('description') ?? $plane->description}} </textarea>
                @error('description')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
</body>
</html>