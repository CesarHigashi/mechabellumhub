<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de avión</title>
</head>
<body>
    <h1>Formulario de avión</h1>
    <form action="/plane" method="POST">
        @csrf
        <label for="name">Nombre del avión</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <label for="year">Año de creación</label>
        <input type="text" name="year" id="year" value="{{ old('year') }}">
        @error('year')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <label for="country">País de origen</label>
        <input type="text" name="country" id="country" value="{{ old('country') }}">
        @error('country')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <label for="machine_guns">Número de ametralladoras</label>
        <input type="number" name="machine_guns" id="machine_guns" value="{{ old('machine_guns') }}">
        @error('machine_guns')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <label for="cannons">Número de cañones</label>
        <input type="number" name="cannons" id="cannons" value="{{ old('cannons') }}">
        @error('cannons')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <label for="turrets">Número de torretas</label>
        <input type="number" name="turrets" id="turrets" value="{{ old('turrets') }}">
        @error('turrets')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <label for="max_height_m">Altura de operación maxima (metros)</label>
        <input type="number" name="max_height_m" id="max_height_m" value="{{ old('max_height_m') }}">
        @error('max_height_m')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <label for="crew">Tripulación</label>
        <input type="number" name="crew" id="crew" value="{{ old('crew') }}">
        @error('crew')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <label for="max_speed_kmh">Velocidad maxima (Km/h)</label>
        <input type="number" name="max_speed_kmh" id="max_speed_kmh" value="{{ old('max_speed_kmh') }}">
        @error('max_speed_kmh')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <label for="weight_kg">Peso (Kg)</label>
        <input type="number" name="weight_kg" id="weight_kg" value="{{ old('weight_kg') }}">
        @error('weight_kg')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <label for="category">Categoria</label>
        <input type="text" name="category" id="category" value="{{ old('category') }}">
        @error('category')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <label for="description">Descripción</label>
        <textarea name="description" id="description"> {{ old('description') }} </textarea>
        @error('description')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>