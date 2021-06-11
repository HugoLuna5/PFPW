<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $devices = Device::paginate(10);
        return view('admin.index', compact('devices'));
    }


}
