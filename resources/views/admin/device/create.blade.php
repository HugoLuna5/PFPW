@extends('layouts.main')
@section('content')

    <div class="container">

        <div class="row">

            <div class="col-6 offset-3 mt-4">

                <div class="card">

                    <div class="card-body">

                        <form action="{{route('saveDevice')}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" required placeholder="Escribe el nombre del dispositivo">
                            </div>


                        </form>

                    </div>

                </div>

            </div>


        </div>

    </div>


@endsection
@section('customJS')

@endsection
