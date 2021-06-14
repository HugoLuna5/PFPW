@extends('layouts.main')
@section('content')

    <div class="container">

        <div class="row">

            <div class="col-6 offset-3 mt-4">

                <div class="card">

                    <div class="card-body">

                        <form action="{{route('saveAlert')}}" method="POST">
                            @csrf

                            <div class="form-group mt-2" >
                                <label for="device_id">Dispositivo</label>
                                <select name="device_id" id="device_id" class="form-control">
                                    <option disabled value="0">Selecciona un dispositivo</option>
                                    @foreach($devices as $device)
                                        <option value="{{$device->id}}">{{$device->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-2">
                                <label for="name">Nombre</label>
                                <input class="form-control" type="text" name="name" id="name" required placeholder="Escribe el nombre de la alerta">
                            </div>

                            <div class="form-group mt-2">
                                <label for="value">Valor de alerta</label>
                                <input class="form-control" type="text" name="value" id="value" required placeholder="Escribe el valor de la alerta">
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
