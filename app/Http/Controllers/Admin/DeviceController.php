<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Direction;
use App\Models\SensorDevice;
use App\Models\TypeSensor;
use Carbon\Carbon;
use DateTime;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{

    public function create()
    {
        $directions = Direction::all();
        return view('admin.device.create', compact('directions'));
    }

    public function save(Request $request)
    {
        if ($request->direction_type == 'new') {
            return $this->createDeviceWithNewDir($request);
        } else {
            return $this->createDeviceWithExistDir($request);
        }

    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'uuid' => ['required'],
            'id' => ['required'],
            'nombre' => ['required'],
            'direction_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->defaultResponse('error', 'Todos los campos son requeridos: ' . $validator->errors());
        }

        if (Device::find($request->id)->update($request->all())){
            return $this->redirectResponse('success', 'Dispositivo actualizado con exito', 'home/devices/show/'.$request->uuid);

        }
        return $this->defaultResponse('error', 'Ocurrio un error al actualizar el dispositivo');


    }


    public function createDeviceWithNewDir($request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required'],
            'street' => ['required'],
            'colony' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'direction_complete' => ['required'],
            'reference_dir' => ['required'],
            'cp' => ['required'],

        ]);

        if ($validator->fails()) {
            return $this->defaultResponse('error', 'Todos los campos son requeridos: ' . $validator->errors());
        }
        $request['uuid'] = \Ramsey\Uuid\Uuid::uuid4()->toString();

        $newDir = Direction::create($request->all());
        if ($newDir != null) {
            $request['direction_id'] = $newDir->id;
            return $this->createDeviceWithExistDir($request);
        }

        return $this->defaultResponse('error', 'Ocurrio un error al agregar el dispositivo');
    }

    public function createDeviceWithExistDir($request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => ['required'],
            'direction_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->defaultResponse('error', 'Todos los campos son requeridos: ' . $validator->errors());
        }
        $request['token'] = uniqid('PFPW');
        $request['uuid'] = \Ramsey\Uuid\Uuid::uuid4()->toString();

        if (Device::create($request->all())) {
            return $this->redirectResponse('success', 'Dispositivo creado con exito', '/home');

        }

        return $this->defaultResponse('error', 'Ocurrio un error al agregar el dispositivo');


    }


    public function show($uuid){

        $device = Device::where('uuid', $uuid)->first();

        if ($device != null){
            $directions = Direction::all();
            return view('admin.device.show', compact('device', 'directions'));
        }

        return abort(404);


    }

    public function addSensor($uuid){
        $device = Device::where('uuid', $uuid)->first();

        if ($device != null){
            $sensors = TypeSensor::all();
            return view('admin.device.addsensor', compact('device', 'sensors'));
        }

        return abort(404);
    }

    public function saveSensor($uuid,Request $request){
        $validator = Validator::make($request->all(), [
            'device_id' => ['required'],
            'type_sensors_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->defaultResponse('error', 'Todos los campos son requeridos: ' . $validator->errors());
        }
        $request['uuid'] = \Ramsey\Uuid\Uuid::uuid4()->toString();
        if (SensorDevice::create($request->all())){
            return $this->redirectResponse('success', 'Sensor agregado con exito', 'home/devices/show/'.$uuid);

        }
        return $this->defaultResponse('error', 'Ocurrio un error al agregar el sensor');

    }

    public function delete(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'Todos los campos son requeridos: ' . $validator->errors()], 200);
        }

        if (Device::find($request->id)->delete()){
            return response()->json(['status' => 'success', 'message' => 'Dispositivo eliminado exitosamente'], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'Ocurrio un error al intentar eliminar el dispositivo'], 200);

    }



    public function report(Request $request){
        $validator = Validator::make($request->all(), [
            'info' => ['required'],
            'type' => ['required'],
            'date' => ['required'],
            'device_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'Todos los campos son requeridos: ' . $validator->errors()], 200);
        }

        $device = Device::find($request->device_id);
        $dat = date('Y-m-d');
        $pdf = null;
        $start = null;
        $end = null;
        $info = $request->info;

        if ($request->date == 'now'){

            $start = $dat." 00:00:00";
            $end = $dat." 23:59:59";
        }else{

            $temStart = new DateTime($request->dateStart);
            $start = $temStart->format('Y-m-d')." 00:00:00";

            $temEnd= new DateTime($request->dateEnd);

            $end = $temEnd->format('Y-m-d')." 23:59:59";
        }



        if ($request->type == 'gen'){//General

            $pdf = PDF::loadView('report.gen', compact('device', 'start', 'end', 'info'));

        }else{//Espe

            $sensor = SensorDevice::find($request->sensor_id);

            $pdf = PDF::loadView('report.report', compact('device', 'start', 'end', 'sensor', 'info'));
        }

        $pdf->save(storage_path('app/public/'.'reporte.pdf'));

        return response()->json(['status'  => 'success', 'message' => 'Reporte generado correctamente'],200);

    }


    public function redirectResponse($status, $message, $path)
    {
        $notification = array(
            'message' => $message,
            'alert-type' => $status
        );
        return redirect()->to($path)->with($notification);
    }

    public function defaultResponse($status, $message)
    {
        $notification = array(
            'message' => $message,
            'alert-type' => $status
        );
        return back()->with($notification);
    }

}
