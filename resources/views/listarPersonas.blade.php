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

    <table>
        <tr>
            <td>
                ID
            </td>
            <td>
                Nombre
            </td>
            <td>
                Apellido
            </td>
            <td>
                Fecha Creación
            </td>
            <td>
                Fecha Modificación
            </td>
        </tr>

        @foreach($personas as $p)
            <tr>
                <td>
                    {{ $p -> id }}
                </td>
                <td>
                    {{ $p -> nombre }}
                </td>
                <td>
                    {{ $p -> apellido }}
                </td>
                <td>
                    {{ $p -> created_at }}
                </td>
                <td>
                    {{ $p -> updated_at }}
                </td>

                <td>
                    <a href="/eliminar/{{ $p -> id }}">Eliminar</a>
                </td>

            </tr>
        @endforeach


    </table>
</body>
</html>