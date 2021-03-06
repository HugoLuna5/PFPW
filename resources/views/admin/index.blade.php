@extends('layouts.main')
@section('content')

    <div class="container">

        <div class="row">

            <div class="col-10 offset-1 mt-4">

                <div class="card">

                    <div class="card-body">
                        @if(count($devices) > 0)


                            <div class="table-responsive">

                            <table id="table" class="table table-striped">

                                <thead class="table-dark">
                                    <tr>
                                        <th>Token</th>
                                        <th>Nombre</th>
                                        <th># Sensores</th>
                                        <th>Fecha de creación</th>
                                        <th>Fecha de actualización</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($devices as $device)
                                        <tr onclick="location.href = '{{route('showDevice', $device->uuid)}}'">
                                            <td>{{$device->token}}</td>
                                            <td>{{$device->nombre}}</td>
                                            <td>{{$device->sensors->count()}}</td>
                                            <td>{{$device->created_at}}</td>
                                            <td>{{$device->updated_at}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>
                        @else
                            <script>
                                location.href = '{{route('createDevice')}}';
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
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                }
            });
        } );
    </script>

@endsection
