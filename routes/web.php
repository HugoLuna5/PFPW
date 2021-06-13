<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth:sanctum'])->group(function (){
    Route::prefix('/home')->group(function (){
        Route::get('', 'App\Http\Controllers\Admin\HomeController@index')->name('homeAdmin');


        Route::prefix('/devices')->group(function (){

            Route::get('/create','App\Http\Controllers\Admin\DeviceController@create')->name('createDevice');
            Route::post('/save','App\Http\Controllers\Admin\DeviceController@save')->name('saveDevice');
            Route::get('/show/{uuid}','App\Http\Controllers\Admin\DeviceController@show')->name('showDevice');
            Route::get('/show/{uuid}/sensor','App\Http\Controllers\Admin\DeviceController@addSensor')->name('addSensorDevice');
            Route::post('/save/{uuid}/sensor','App\Http\Controllers\Admin\DeviceController@saveSensor')->name('saveSensorDevice');

        });

        Route::prefix('/sensors')->group(function (){

            Route::get('', 'App\Http\Controllers\Admin\SensorsController@index')->name('homeSensors');
            Route::get('/create', 'App\Http\Controllers\Admin\SensorsController@create')->name('createSensor');
            Route::post('/save', 'App\Http\Controllers\Admin\SensorsController@save')->name('saveSensor');
            Route::get('/show/{uuid}', 'App\Http\Controllers\Admin\SensorsController@show')->name('showSensor');

            Route::put('/update', 'App\Http\Controllers\Admin\SensorsController@update')->name('updateSensor');


        });


    });
});




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
