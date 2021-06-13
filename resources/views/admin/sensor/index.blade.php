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
                                <button onclick="location.href = '{{route('createSensor')}}'" class="btn btn-primary">Agregar sensor</button>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        @if(count($sensors) > 0)


                            <div class="table-responsive">

                                <table id="table" class="table table-striped">

                                    <thead class="table-dark">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Fecha de creación</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sensors as $sensor)
                                        <tr>
                                            <td class="col-3">
                                                <a href="#"
                                                   data-type="text"
                                                   data-pk="{{$sensor->id}}"
                                                   data-url="{{route('updateSensor')}}"
                                                   data-title="Nombre"
                                                   data-value="{{$sensor->nombre}}"
                                                   class="set-desc text-gray-900 whitespace-no-wrap"
                                                   data-name="nombre"></a>

                                            </td>
                                            <td class="col-">
                                                <a href="#"
                                                   data-type="text"
                                                   data-pk="{{$sensor->id}}"
                                                   data-url="{{route('updateSensor')}}"
                                                   data-title="Descripción"
                                                   data-value="{{$sensor->description}}"
                                                   class="set-desc text-gray-900 whitespace-no-wrap"
                                                   data-name="description"></a>
                                            </td>

                                            <td class="col-3">{{$sensor->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>

                            </div>
                        @else
                            <script>
                                location.href = '{{route('createSensor')}}';
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
        $(document).ready(function() {
            $('#table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                }
            });
        } );


        $.fn.editable.defaults.mode = 'inline';
        $.fn.editable.defaults.ajaxOptions = {type: 'PUT'};

        $(".set-desc").editable({
            emptytext: 'No asignada',
            ajaxOptions: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                dataType: 'json'
            },
            success: function (response, newValue) {

                if (response.status === 'success') {
                    console.log("Success")
                }

            }
        });


    </script>

@endsection
