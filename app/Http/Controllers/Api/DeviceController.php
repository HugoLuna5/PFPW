<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataSensor;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{

    public $successStatus = 200;

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => ['required'],
            'values' => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->responseJson(['status' => 'error', 'message' => 'Todos los campos son requeridos: ' . $validator->errors()], $this->successStatus);
        }


            $request['uuid'] = \Ramsey\Uuid\Uuid::uuid4()->toString();

            $request['value'] = $this->checkValues($request->values);


            $newValue = DataSensor::create($request->all());

            if ($newValue != null) {

                return $this->responseJson(['status' => 'success', 'message' => 'Valores guardado con exito'], $this->successStatus);

            }





        return $this->responseJson(['status' => 'error', 'message' => 'Ocurrio un error al registar el nuevo valor'], $this->successStatus);
    }

    public function checkValues($values)
    {
        $allItems = '';
        $size = sizeof($values);

        for ($i = 0; $i < $size; $i++) {

            if ($i == ($size - 1)) {
                $allItems .= $values[$i]['item'] . ':' . $values[$i]['valor'] . '';
            } else {
                $allItems .= $values[$i]['item'] . ':' . $values[$i]['valor'] . '</br>';
            }

        }


        return $allItems;

    }


    public function responseJson($data, $code)
    {
        return response()->json($data, $code);
    }

}
