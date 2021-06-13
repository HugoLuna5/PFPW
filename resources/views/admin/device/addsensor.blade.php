@extends('layouts.main')
@section('content')

    <div class="container">
        @include('layouts.alerts')
        <div class="row">

            <div class="col-6 offset-3 mt-4">

                <div class="card">

                    <div class="card-body">

                        <form action="{{route('saveSensorDevice', $device->uuid)}}" method="POST">
                            @csrf
                            <input type="hidden" name="device_id" id="device_id" value="{{$device->id}}">
                            <div class="form-group mt-3">
                                <label for="type_sensors_id">Sensor</label>
                                <select name="type_sensors_id" id="type_sensors_id" class="form-control">
                                    <option disabled value="0">Selecciona un sensor</option>
                                    @foreach($sensors as $sensor)
                                        <option value="{{$sensor->id}}">{{$sensor->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>




                            <div class="form-group mt-4 d-grid">
                                <button class="btn btn-success" type="submit">AGREGAR</button>
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
