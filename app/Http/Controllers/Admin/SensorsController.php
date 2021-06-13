<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\TypeSensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SensorsController extends Controller
{

    public function index(){
        $sensors = TypeSensor::paginate();

        return view('admin.sensor.index', compact('sensors'));
    }


    public function create(){
        return view('admin.sensor.create');
    }

    public function save(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre' => ['required'],
            'description' => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->defaultResponse('error', 'Todos los campos son requeridos: ' . $validator->errors());
        }
        $request['uuid'] = \Ramsey\Uuid\Uuid::uuid4()->toString();
        if (TypeSensor::create($request->all())) {
            return $this->redirectResponse('success', 'Sensor creado con exito', '/home');

        }

        return $this->defaultResponse('error', 'Ocurrio un error al agregar el sensor');


    }

    public function update(Request $request){
        TypeSensor::find($request->pk)->update([$request->name => $request->value]);
        return response()->json(['status' => 'success', 'message' => 'Información actualizada correctamente'], 200);


    }

    public function show($uuid){

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
