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
            <form action="/tank" method="POST">
                @csrf

                <label for="year">Nombre</label>
                <input type="text" class="form-control name-form" placeholder="Nombre del tanque" name="name" id="name" value="{{ old('name') }}" required>
                @error('name')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="year">Año</label>
                <input type="text" class="form-control name-form" placeholder="Año de creación" name="year" id="year" value="{{ old('year') }}" required>
                @error('year')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <!-- FALTA RESOLVER QUE RECUPERE EL VALOR SI SE EQUIVOCA -->
                <label for="nations_id">País de origen</label>
                <!-- --------------------------------- -->
                <select name="nations_id" id="nations_id">
                    @foreach ($nations as $nation)
                        <option value="{{ $nation->id }}">{{ $nation->name }}</option>
                    @endforeach
                </select>
                <!-- --------------------------------- -->
                <!-- <input type="text" name="country" id="country" value="{{ old('country') }}"> -->
                @error('nations_id')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="caliber_mm">Calibre</label>
                <input type="number" class="form-control name-form" placeholder="Calibre del cañón (mm)" name="caliber_mm" id="caliber_mm" value="{{ old('caliber_mm') }}" required>
                @error('caliber_mm')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="crew">Tripulación</label>
                <input type="number" class="form-control name-form" placeholder="Tripulación del tanque" name="crew" id="crew" value="{{ old('crew') }}" required>
                @error('crew')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="max_speed_kmh">Velocidad máxima</label>
                <input type="number" class="form-control name-form" placeholder="Velocidad máxima en km/h" name="max_speed_kmh" id="max_speed_kmh" value="{{ old('max_speed_kmh') }}" required>
                @error('max_speed_kmh')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="weight_kg">Peso</label>
                <input type="number" class="form-control name-form" placeholder="Peso (kg)" name="weight_kg" id="weight_kg" value="{{ old('weight_kg') }}" required>
                @error('weight_kg')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="category">Categoría</label>
                <input type="text" class="form-control name-form" placeholder="Categoría de vehiculo" name="category" id="category" value="{{ old('category') }}" required>
                @error('category')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="description" class = "description-form">Descripción</label>
                <textarea rows="4" cols="50" class="message-form" name="description" id="description" required> {{ old('description') }} </textarea>
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