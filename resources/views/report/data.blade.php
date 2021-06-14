<div class="card">
    <h6 class="card-title text-center">Datos</h6>
    <div class="card-body">

        <table class="table table-bordered mb-5">
            <thead>
            <tr class="table-danger">
                <th scope="col">#</th>
                <th scope="col">Valor reportado</th>
                <th scope="col">Fecha y hora</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sensor->values->whereBetween('created_at', [$start, $end]) as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{!! $data->value !!}</td>
                    <td>{{ $data->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

</div>
