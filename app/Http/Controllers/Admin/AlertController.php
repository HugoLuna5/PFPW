<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alert;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlertController extends Controller
{

    public function index(){
        $devices = Device::all();
        $alerts = Alert::all();
        return view('admin.alert.index', compact('alerts', 'devices'));
    }


    public function create(){

        $devices = Device::all();
        return view('admin.alert.create', compact('devices'));
    }

    public function save(Request $request){
        $validator = Validator::make($request->all(), [
            'device_id' => ['required'],
            'name' => ['required'],
            'value' => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->defaultResponse('error', 'Todos los campos son requeridos: ' . $validator->errors());
        }

        $request['uuid'] = \Ramsey\Uuid\Uuid::uuid4()->toString();

        if (Alert::create($request->all())){
            return $this->redirectResponse('success', 'Alerta creada con exito', '/home/alerts');

        }

        return $this->defaultResponse('error', 'Ocurrio un error al agregar la alerta');

    }


    public function update(Request $request){
        Alert::find($request->pk)->update([$request->name => $request->value]);
        return response()->json(['status' => 'success', 'message' => 'Información actualizada correctamente'], 200);


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
