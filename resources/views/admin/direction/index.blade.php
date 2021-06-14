@extends('layouts.main')
@section('customCSS')

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
                                <button onclick="location.href = '{{route('createDirection')}}'" class="btn btn-primary">Agregar dirección</button>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        @if(count($directions) > 0)


                            <div class="table-responsive">

                                <table id="table" class="table table-striped">

                                    <thead class="table-dark">
                                    <tr>
                                        <th>C.P.</th>
                                        <th>Estado</th>
                                        <th>Ciudad</th>
                                        <th>Colonia</th>
                                        <th>Calle</th>
                                        <th>Fecha de creación</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($directions as $direction)
                                        <tr onclick="location.href = '{{route('showDirection', $direction->uuid)}}' ">
                                            <td>{{$direction->cp}}</td>
                                            <td>{{$direction->state}}</td>
                                            <td>{{$direction->city}}</td>
                                            <td>{{$direction->colony}}</td>
                                            <td>{{$direction->street}}</td>
                                            <td>{{$direction->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>

                            </div>
                        @else
                            <script>
                                location.href = '{{route('createDirection')}}';
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
