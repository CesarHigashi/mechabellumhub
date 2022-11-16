<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de tanque</title>
</head>
<body>
    <h1>Formulario de tanque</h1>
    <form action="/tank/{{$tank->id}}" method="POST">
        @csrf
        @method('patch')
        <label for="name">Nombre del tanque</label>
        <input type="text" name="name" id="name" value="{{ old('name') ?? $tank->name }}">
        @error('name')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <label for="year">Año de creación</label>
        <input type="text" name="year" id="year" value="{{ old('year') ?? $tank->year }}">
        @error('year')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <label for="country">País de origen</label>
        <input type="text" name="country" id="country" value="{{ old('country') ?? $tank->country }}">
        @error('country')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <label for="caliber_mm">Calibre (mm)</label>
        <input type="number" name="caliber_mm" id="caliber_mm" value="{{ old('caliber_mm') ?? $tank->caliber_mm }}">
        @error('caliber_mm')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <label for="crew">Tripulación</label>
        <input type="number" name="crew" id="crew" value="{{ old('crew') ?? $tank->crew }}">
        @error('crew')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <label for="max_speed_kmh">Velocidad maxima (Km/h)</label>
        <input type="number" name="max_speed_kmh" id="max_speed_kmh" value="{{ old('max_speed_kmh') ?? $tank->max_speed_kmh }}">
        @error('max_speed_kmh')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <label for="weight_kg">Peso (Kg)</label>
        <input type="number" name="weight_kg" id="weight_kg" value="{{ old('weight_kg') ?? $tank->weight_kg }}">
        @error('weight_kg')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <label for="category">Categoria</label>
        <input type="text" name="category" id="category" value="{{ old('category') ?? $tank->category }}">
        @error('category')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <label for="description">Descripción</label>
        <textarea name="description" id="description"> {{ old('description') ?? $tank->description}} </textarea>
        @error('description')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>