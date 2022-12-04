<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de tanque</title>

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
        <h1>Formulario de tanque</h1>
        <div class="form-group group-coustume">
            <form action="/tank/{{$tank->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <label for="year">Nombre del Tanque</label>
                <input type="text" class="form-control name-form" placeholder="Nombre del tanque" name="name" id="name" value="{{ old('name') ?? $tank->name }}">
                @error('name')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="year">Año de creación</label>
                <input type="number" class="form-control name-form" placeholder="Año de creación" name="year" id="year" value="{{ old('year') ?? $tank->year }}">
                @error('year')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="nations_id">País de origen</label>
                <select name="nations_id" id="nations_id">
                    @foreach ($nations as $nation)
                        <option value="{{ $nation->id }}" @selected( old('nations_id') == $nation->id ?? $tank->nations_id == $nation->id)>{{ $nation->name }}</option>
                    @endforeach
                </select>
                @error('nations_id')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="caliber_mm">Calibre del cañón (mm)</label>
                <input type="number" class="form-control name-form" placeholder="Calibre del cañón (mm)" name="caliber_mm" id="caliber_mm" value="{{ old('caliber_mm') ?? $tank->caliber_mm }}">
                @error('caliber_mm')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="crew">Tripulación</label>
                <input type="number" class="form-control name-form" placeholder="Tripulación" name="crew" id="crew" value="{{ old('crew') ?? $tank->crew }}">
                @error('crew')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="max_speed_kmh">Velocidad máxima (km/h)</label>
                <input type="number" class="form-control name-form" placeholder="Velocidad máxima (km/h)" name="max_speed_kmh" id="max_speed_kmh" value="{{ old('max_speed_kmh') ?? $tank->max_speed_kmh }}">
                @error('max_speed_kmh')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="weight_kg">Peso (kg)</label>
                <input type="number" class="form-control name-form" placeholder="Peso (kg)" name="weight_kg" id="weight_kg" value="{{ old('weight_kg') ?? $tank->weight_kg }}">
                @error('weight_kg')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="category">Categoría de vehiculo</label>
                <input type="text" class="form-control name-form" placeholder="Categoría de vehiculo" name="category" id="category" value="{{ old('category') ?? $tank->category }}">
                @error('category')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="image">Subir imagen</label>
                <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg">

                <label for="description" class = "description-form">Descripción</label>
                <textarea rows="4" cols="50" class="message-form" name="description" id="description"> {{ old('description') ?? $tank->description }} </textarea>
                @error('description')
                    <i>{{ $message }}</i>
                @enderror
                
                <br>

                <input type="submit" class="btn btn-default btn-submit" value="Enviar">

            </form>
        </div>
    </div>
</body>
</html>