@extends('layouts.main')
@section('content')

    <div class="container">
        @include('layouts.alerts')

        <div class="row">

            <div class="col-3 mt-4">

                <div class="card">

                    <div class="card-body">

                        <form action="{{route('saveDevice')}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="token">Token</label>
                                <input class="form-control" type="text" name="token" id="token" required disabled value="{{$device->token}}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="nombre">Nombre</label>
                                <input class="form-control" value="{{$device->nombre}}" type="text" name="nombre" id="nombre" required placeholder="Escribe el nombre del dispositivo">
                            </div>


                            <div class="form-group mt-3" id="containerDirections">
                                <label for="direction_id">Dirección</label>
                                <select name="direction_id" id="direction_id" class="form-control">
                                    <option disabled value="0">Selecciona una dirección</option>
                                    @foreach($directions as $direction)
                                        <option value="{{$direction->id}}">{{$direction->direction_complete}}</option>
                                    @endforeach
                                </select>
                            </div>




                            <div class="form-group mt-4 d-grid">
                                <button class="btn btn-success" type="submit">ACTUALIZAR</button>
                            </div>


                        </form>

                    </div>

                </div>

            </div>

            <div class="col-9 mt-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row">

                            <div class="col"></div>
                            <div class="col-auto">
                                <button onclick="location.href = '{{route('addSensorDevice', $device->uuid)}}'" class="btn btn-outline-primary">Agregar sensor</button>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">

                            <table id="table" class="table table-striped text-center">

                                <thead class="table-dark">
                                <tr>
                                    <th>Sensor</th>
                                    <th>Último registro</th>
                                    <th>Fecha y hora de actualización</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($device->sensors as $sensor)
                                    <tr>
                                        <td>
                                            {{$sensor->sensor->nombre}}
                                        </td>
                                        <td>
                                            @if($sensor->values->last())
                                            {!! $sensor->values->last()->value !!}

                                            @endif
                                        </td>
                                        <td>
                                            {{$sensor->updated_at}}
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>


                            </table>

                        </div>


                    </div>
                </div>
            </div>


        </div>

    </div>


@endsection
@section('customJS')
    <script>
        document.getElementById('direction_id').value = '{{$device->direction_id}}';
    </script>
@endsection
