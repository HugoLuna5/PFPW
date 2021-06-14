@extends('layouts.main')
@section('customCSS')
    <link href="{{asset('/css/xeditable/app.css')}}" rel="stylesheet"/>
    <link href="{{asset('/css/xeditable/edit.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('fonts/feather/feather.min.css')}}">
@endsection


@section('content')

    <div class="container">

        <div class="row">

            <div class="col-10 offset-1 mt-4">

                <div class="card">
                    <div class="card-header">
                        <div class="row">

                            <div class="col"></div>
                            <div class="col-auto">
                                <button onclick="location.href = '{{route('createAlert')}}'" class="btn btn-primary">
                                    Agregar sensor
                                </button>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        @if(count($alerts) > 0)


                            <div class="table-responsive">

                                <table id="table" class="table table-striped text-center">

                                    <thead class="table-dark">
                                    <tr>
                                        <th>Dispositivo</th>
                                        <th>Nombre</th>
                                        <th>Valor</th>
                                        <th>Fecha de creación</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($alerts as $alert)
                                        <tr>
                                            <td class="col-3">

                                                <a href="#"
                                                   data-type="select"
                                                   data-pk="{{$alert->id}}"
                                                   data-url="{{route('updateAlert')}}"
                                                   data-title="Dispositivo"
                                                   data-value="{{$alert->device_id}}"
                                                   class="set-device "
                                                   data-name="device_id"></a>

                                            </td>

                                            <td class="col-3">
                                                <a href="#"
                                                   data-type="text"
                                                   data-pk="{{$alert->id}}"
                                                   data-url="{{route('updateAlert')}}"
                                                   data-title="Nombre"
                                                   data-value="{{$alert->name}}"
                                                   class="set-desc text-gray-900 whitespace-no-wrap"
                                                   data-name="name"></a>
                                            </td>
                                            <td class="col-2">
                                                <a href="#"
                                                   data-type="text"
                                                   data-pk="{{$alert->id}}"
                                                   data-url="{{route('updateAlert')}}"
                                                   data-title="Valor"
                                                   data-value="{{$alert->value}}"
                                                   class="set-desc text-gray-900 whitespace-no-wrap"
                                                   data-name="value"></a>

                                            </td>

                                            <td class="col-3">{{$alert->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>

                            </div>
                        @else
                            <script>
                                location.href = '{{route('createAlert')}}';
                            </script>
                        @endif
                    </div>

                </div>

            </div>


        </div>

    </div>


@endsection
@section('customJS')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{asset('js/xeditable/app.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                }
            });
        });

        const headers = {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        };

        $.fn.editable.defaults.mode = 'inline';
        $.fn.editable.defaults.ajaxOptions = {type: 'PUT'};

        $(".set-desc").editable({
            emptytext: 'No asignada',
            ajaxOptions: {
                headers: headers,
                type: 'put',
                dataType: 'json'
            },
            success: function (response) {

                if (response.status === 'success') {
                    console.log("Success")
                }

            }
        });

        $(".set-device").editable({
            emptytext: 'No asignado',
            source: [
                    @foreach($devices as $device)
                {
                    value: '{{$device->id}}', text: '{{$device->nombre}}'
                },
                @endforeach

            ],
            ajaxOptions: {
                headers: headers,
                type: 'put',
                dataType: 'json',
            },
            success: function (response) {
                if (response.status === 'success') {
                    console.log("Success")
                }
            }
        });


    </script>

@endsection
