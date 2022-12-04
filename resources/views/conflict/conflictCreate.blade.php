<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de conflicto</title>

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
        <h1>Formulario de conflicto</h1>
        <div class="form-group group-coustume">
            <form action="/conflict" method="POST">
                @csrf
                
                <label for="name">Nombre del conflicto</label>
                <input class="form-control name-form" placeholder="Nombre del conflicto" type="text" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="start_year">Año de inicio</label>
                <input class="form-control name-form" placeholder="Año de inicio" type="number" name="start_year" id="start_year" value="{{ old('start_year') }}">
                @error('start_year')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="end_year">Año de finalizacion</label>
                <input class="form-control name-form" placeholder="Año de finalizacion" type="number" name="end_year" id="end_year" value="{{ old('end_year') }}">
                @error('end_year')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="nation_id[]">Paises beligerantes</label>
                <select name="nation_id[]" id="nation_id[]" multiple style="width: 400px; height: 150px;">
                    @foreach ($nations as $nation)
                        <option value="{{ $nation->id }}">{{ $nation->name }}</option>
                    @endforeach
                </select>
                <br>
                <i>Para seleccionar mas de una opcion, mantenga presionada la tecla CTRL mientras da click a las opciones</i>
                <br>
                <i>Para deseleccionar una opcion de las seleccionadas, mantenga presionada la tecla CTRL mientras da click en la opcion que desea desmarcar</i>
                <br>
                @error('nations_id')
                    <i>{{ $message }}</i>
                @enderror
                <br>

                <label for="description">Descripción</label>
                <textarea rows="4" cols="50" class="message-form" name="description" id="description"> {{ old('description') }} </textarea>
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