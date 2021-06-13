@extends('layouts.main')
@section('content')

    <div class="container">

        <div class="row">

            <div class="col-6 offset-3 mt-4">

                <div class="card">

                    <div class="card-body">

                        <form action="{{route('saveSensor')}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" required placeholder="Escribe el nombre del dispositivo">
                            </div>
                            <div class="form-group">
                                <label for="description" class="font-bold mt-4 mb-2">Descripción</label>
                                <textarea id="description" name="description" required class="form-control"  placeholder="Agregar una descripción"></textarea>
                            </div>


                            <div class="form-group mt-4 d-grid">
                                <button class="btn btn-success" type="submit">GUARDAR</button>
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
