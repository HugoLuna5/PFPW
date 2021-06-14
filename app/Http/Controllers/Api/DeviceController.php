<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendAlert;
use App\Models\Alert;
use App\Models\DataSensor;
use App\Models\Device;
use App\Models\ReportAlert;
use App\Models\SensorDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

            $request['value'] = $this->checkValues($request->values, $request->sensor_device_id);


            $newValue = DataSensor::create($request->all());

            if ($newValue != null) {

                return $this->responseJson(['status' => 'success', 'message' => 'Valores guardado con exito'], $this->successStatus);

            }





        return $this->responseJson(['status' => 'error', 'message' => 'Ocurrio un error al registar el nuevo valor'], $this->successStatus);
    }

    public function checkValues($values, $id)
    {
        $allItems = '';
        $size = sizeof($values);

        $sensor = SensorDevice::find($id);
        $device = Device::find($sensor->device_id);

        $alerts = Alert::where('device_id', '=', $sensor->device_id)->get();

        for ($i = 0; $i < $size; $i++) {

            if ($i == ($size - 1)) {
                $allItems .= $values[$i]['item'] . ':' . $values[$i]['valor'] . '';
            } else {
                $allItems .= $values[$i]['item'] . ':' . $values[$i]['valor'] . '</br>';
            }


            foreach ($alerts as $alert){

                if ( (strtolower(trim($values[$i]['item'])) == strtolower(trim($alert->name))) &&
                    ( (float)$values[$i]['valor'] >= (float)$alert->value)
                ){
                    ReportAlert::create([
                       'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                        'device_id' => $sensor->device_id,
                        'alert_id' => $alert->id,
                        'sensor_device_id' => $id,
                        'normal_value' => (float)$alert->value,
                        'current_value' => (float)$values[$i]['valor']
                    ]);


                    $objDemo = new \stdClass();
                    $objDemo->device = $device->nombre;
                    $objDemo->alert = $alert->name;
                    $objDemo->normal = (float)$alert->value;
                    $objDemo->current = (float)$values[$i]['valor'];
                    $objDemo->sender = 'megah@terciajcl.com';
                    $objDemo->receiver = "hugodariolc@gmail.com";

                    Mail::to("hugodariolc@gmail.com")->send(new SendAlert($objDemo));
                }

            }

        }


        return $allItems;

    }


    public function responseJson($data, $code)
    {
        return response()->json($data, $code);
    }

}
