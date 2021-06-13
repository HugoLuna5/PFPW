<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $devices = Device::all();
        return view('admin.index', compact('devices'));
    }


}
