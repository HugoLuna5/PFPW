@extends('layouts.main')
@section('content')

    <div class="container">

        <div class="row">

            <div class="col-6 offset-3 mt-4">

                <div class="card">

                    <div class="card-body">

                        <form action="{{route('saveDirection')}}" method="POST">
                            @csrf


                                <div class="form-group">
                                    <label for="map" class="font-bold mb-2">Ubicación</label>
                                    <div id="map"  class="z-depth-1-half map-container" style="height: 300px; "></div>
                                </div>
                                <input required type="hidden" name="latitude" id="lat">
                                <input required type="hidden" name="longitude" id="long">
                                <input required type="hidden" name="direction_complete" id="direction_complete">


                                <div class="form-group mt-3">
                                    <label for="state" class="font-bold mb-2">Estado</label>
                                    <input required name="state" id="state" class="form-control" type="text" placeholder="Ingresa la calle">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="city" class="font-bold mb-2">Ciudad</label>
                                    <input required name="city" id="city" class="form-control" type="text" placeholder="Ingresa la calle">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="colony" class="font-bold mb-2">Colonia</label>
                                    <input required name="colony" id="colony" class="form-control" type="text" placeholder="Ingresa la calle">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="street" class="font-bold mb-2">Calle</label>
                                    <input required name="street" id="street" class="form-control" type="text" placeholder="Ingresa la calle">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="cp" class="font-bold mb-2">C.P.</label>
                                    <input required name="cp" id="cp" class="form-control" type="text" placeholder="Ingresa la calle">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="reference_dir" class="font-bold mt-4 mb-2">Referencias</label>
                                    <textarea id="reference_dir" name="reference_dir" class="form-control"  placeholder="Agregar una referencia"></textarea>
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
    <script defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXSaVaqAVkg_9uTpHClpr094piXGy3998&callback=initMap&libraries=&v=weekly">
    </script>
    <script src="{{asset('/js/direction/create.js')}}"></script>
@endsection
