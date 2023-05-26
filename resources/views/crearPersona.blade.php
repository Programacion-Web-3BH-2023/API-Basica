<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @include("encabezado");

    <form action="/crear" method="post">
        @csrf 
        Nombre <input type="text" name="nombre" id=""> <br>
        Apellido <input type="text" name="apellido" id=""> <br>
        <input type="submit" value="Enviar">
    </form>

    @isset($creado)
        <b>Persona creada</b>
    @endisset
  

</body>
</html>