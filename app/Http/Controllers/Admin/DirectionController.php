<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Direction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DirectionController extends Controller
{

    public function index(){
        $directions = Direction::all();

        return view('admin.direction.index', compact('directions'));
    }

    public function create(){
        return view('admin.direction.create');
    }

    public function save(Request $request){
        $validator = Validator::make($request->all(), [
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
            return $this->redirectResponse('success', 'Dirección agregada con exito', '/home/directions');
        }


        return $this->defaultResponse('error', 'Ocurrio un error al agregar la dirección');


    }


    public function show($uuid){

        $direction = Direction::where('uuid', '=', $uuid)->first();


        if ($direction != null){
            return view('admin.direction.show', compact('direction'));
        }

        abort(404);

    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => ['required'],
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

        if (Direction::find($request->id)->update($request->all())){
            return $this->redirectResponse('success', 'Dirección actualizada con exito', '/home/directions');

        }

        return $this->defaultResponse('error', 'Ocurrio un error al actualizar la dirección');

    }


    public function delete(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => ['required'],

        ]);

        if ($validator->fails()) {
            return $this->defaultResponse('error', 'Todos los campos son requeridos: ' . $validator->errors());
        }

        if (Direction::find($request->id)->delete()){
            return response()->json(['status' => 'success', 'message' => 'Dirección eliminada correctamente'], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'Ocurrio un error al eliminar la dirección'], 200);

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
