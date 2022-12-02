<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $titulo }} </title>

    <!-- RUTAS Y ESTILOS PROVISIONALES-->
	<link rel="stylesheet" type="text/css" href="/styles/source/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/styles/source/font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="/styles/style/slider.css">
	<link rel="stylesheet" type="text/css" href="/styles/style/mystyle.css">
	<link rel="stylesheet" type="text/css" href="/styles/style/formstyle.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    
    {{-- <h1> {{ $titulo }} </h1> --}}
    <div>
        {{ $slot }}
    </div>

    <!-- Recursos de JS -->
    <script type="text/javascript" src="styles/source/bootstrap-3.3.6-dist/js/jquery.js"></script>
    <script type="text/javascript" src="styles/source/js/isotope.js"></script>
    <script type="text/javascript" src="styles/source/js/myscript.js"></script> 
    <script type="text/javascript" src="styles/source/bootstrap-3.3.6-dist/js/bootstrap.js"></script>

</body>

</html>