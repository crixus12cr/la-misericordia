<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Título Principal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-5 text-center">
            <i class="fas fa-hospital"></i> Hospital La Misericordia
        </h1>

        <div class="row">
            <div class="col-lg-4">
                <table class="table table-bordered w-100" style="border-color: white;">
                    <thead>
                        <tr>
                            <th scope="col" class="text-white"
                                style="font-size: 1.5rem; width: 300px; height: 70px; background-color: #000080;">Módulo
                            </th>
                            <th scope="col" class="text-white"
                                style="font-size: 1.5rem; width: 300px; height: 70px; background-color: #000080;">Turno
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $modulos = []; // reemplaza esto con tus datos
                            $turnos = []; // reemplaza esto con tus datos
                        @endphp

                        @for ($i = 0; $i < 5; $i++)
                            <tr>
                                @if ($i == 0)
                                    <td class="text-red-500"
                                        style="font-size: 1.5rem; width: 300px; height: 70px; background-color: #ffffff; color: red;">
                                        <b>{{ $modulos[$i] ?? '' }}</b>
                                    </td>
                                    <td class="text-red-500"
                                        style="font-size: 1.5rem; width: 300px; height: 70px; background-color: #ffffff; color: red;">
                                        <b>{{ $turnos[$i] ?? '' }}</b>
                                    </td>
                                @else
                                    <td class="text-white"
                                        style="font-size: 1.5rem; width: 300px; height: 70px; background-color: #000080;">
                                        <b>{{ $modulos[$i] ?? '' }}</b>
                                    </td>
                                    <td class="text-white"
                                        style="font-size: 1.5rem; width: 300px; height: 70px; background-color: #000080;">
                                        <b>{{ $turnos[$i] ?? '' }}</b>
                                    </td>
                                @endif
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <div class="col-lg-8 d-none d-lg-block">
                <div class="h-100 bg-image"
                    style="background-image: url('https://i.pinimg.com/564x/72/3b/f8/723bf831b674ed3fefdcd0e9c0030644.jpg');">
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white text-center py-3 fixed-bottom">
        <p>&copy; {{ date('Y') }} Hospital La Misericordia. Todos los derechos reservados. | by <a href="https://github.com/crixus12cr" class="text-white">Crixus</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
