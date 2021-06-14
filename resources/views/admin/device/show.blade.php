@extends('layouts.main')
@section('content')

    <div class="container">


        <div class="row">

            <div class="col-3 mt-4">

                <div class="card">



                    <div class="card-body">
                        <h5 class="card-title">Información</h5>
                        <hr>
                        <form action="{{route('updateDevice')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{$device->id}}">
                            <input type="hidden" name="uuid" id="uuid" value="{{$device->uuid}}">
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
                                <button class="btn btn-outline-success" type="submit">ACTUALIZAR</button>
                                <hr>
                                <button onclick="deleteDevice('{{$device->id}}')" class="btn btn-outline-danger" type="button">ELIMINAR</button>
                            </div>


                        </form>

                    </div>

                </div>

            </div>

            <div class="col-9 mt-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row">

                            <div class="col">
                               <h5 class="card-title">Sensores</h5>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#modalReport">Generar reporte</button>
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
                                            @if($sensor->values->last())
                                                {!! $sensor->values->last()->updated_at !!}

                                            @endif

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



    <!-- Modal -->
    <div class="modal fade" id="modalReport" tabindex="-1" aria-labelledby="modalReportLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReportLabel">Generar reporte</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="type_repo">Tipo de reporte</label>
                        <select name="type_repo" id="type_repo" class="form-control">
                            <option value="gen">General</option>
                            <option value="sen">Por sensor</option>
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="info">Información</label>
                        <select name="info" id="info" class="form-control">
                            <option value="Datos y alertas">Datos y alertas</option>
                            <option value="Solo Datos">Solo Datos</option>
                            <option value="Solo Alertas">Solo Alertas</option>
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="action">¿Enviar a mi correo electronico?</label>
                        <select name="action" id="action" class="form-control">
                            <option value="no">No</option>
                            <option value="si">Si</option>

                        </select>
                    </div>

                    <div class="form-group mt-2" id="sensores">
                        <label for="report_sensor">Sensor</label>
                        <select name="report_sensor" id="report_sensor" class="form-control">
                            @foreach($device->sensors as $sensor)
                                <option value="{{$sensor->id}}">{{$sensor->sensor->nombre}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group mt-2">
                        <label for="date_data_report">Fecha de información</label>
                        <select name="date_data_report" id="date_data_report" class="form-control">
                            <option value="now">Hoy</option>
                            <option value="date_esp">Especificar</option>
                        </select>
                    </div>

                    <div class="form-group mt-2" id="dates">
                        <label for="dateStart">Fecha inicial</label>
                        <input type="date" name="dateStart" id="dateStart" class="form-control" placeholder="Selecciona la fecha inicial">

                        <label for="dateEnd">Fecha final</label>
                        <input type="date" name="dateEnd" id="dateEnd" class="form-control" placeholder="Selecciona la fecha final">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
                    <button id="generateReport" type="button" class="btn btn-primary">GENERAR</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('customJS')

    <script>
        const routeGenerateReport = '{{route('report')}}';
        const headers = {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json'
        };

        document.getElementById('direction_id').value = '{{$device->direction_id}}';

        function deleteDevice(id) {

            fetch('{{route('deleteDevice')}}', {
                method: 'POST',
                body: JSON.stringify({
                    id: id
                }),
                headers: headers
            }).then((response) => response.json())
                .then(function (data) {
                    console.log(data)
                    if (data.status === 'success') {
                        location.href = '/home'
                    } else {
                        location.reload();
                    }
                });
        }

    </script>

    <script src="{{asset('/js/report.js')}}"></script>
@endsection
