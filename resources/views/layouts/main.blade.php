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
    @yield('customCSS')
    <title>PFPW</title>
</head>
<body>

<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid customMarginNav">
            <a class="navbar-brand" href="{{url('/')}}">PFPW</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                <ul class="navbar-nav ml-auto marginMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (\Request::route()->getName() == 'homeAdmin') ? 'active' : ''  }}" aria-current="page" href="{{route('homeAdmin')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (\Request::route()->getName() == 'createDevice') ? 'active' : ''  }}" href="{{route('createDevice')}}">Agregar disp</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ (\Request::route()->getName() == 'homeSensors') ? 'active' : ''  }}" href="{{route('homeSensors')}}">Sensores</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ (\Request::route()->getName() == 'homeDirection') ? 'active' : ''  }}" href="{{route('homeDirection')}}">Direcciones</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ (\Request::route()->getName() == 'homeAlert') ? 'active' : ''  }}" href="{{route('homeAlert')}}">Alertas</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{url('/user/profile')}}" >Perfil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li> <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
                                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none">
                                    @csrf
                                </form></li>
                        </ul>
                    </li>


                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">





                    </div>

                </ul>
            </div>
        </div>
    </nav>

    @include('layouts.alerts')

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
@yield('customJS')


</body>
</html>
