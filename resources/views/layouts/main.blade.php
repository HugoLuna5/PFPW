<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{asset('/css/admin.css')}}">
    <title>PFPW</title>
</head>
<body>

<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid customMarginNav">
            <a class="navbar-brand" href="#">PFPW</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                <ul class="navbar-nav ml-auto marginMenu">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('homeAdmin')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('createDevice')}}">Agregar disp</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="">Sensores</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="">Direcciones</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
@yield('customJS')


</body>
</html>
