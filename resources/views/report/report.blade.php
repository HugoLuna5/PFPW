<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-2">
    <h2 class="text-center mb-3">Reporte de {{$info}} proporcionados por el dispositivo "{{$device->nombre}}"</h2>





            <h3 class="card-title text-center">Sensor: {{$sensor->sensor->nombre}} - {{$start.' / '.$end}}</h3>

            @if($info == 'Datos y alertas')

                @include('report.data')
                <hr>
                @include('report.alert')

            @elseif($info == 'Solo Datos')
                @include('report.data')
            @else
                @include('report.alert')
            @endif






</div>

</body>

</html>
