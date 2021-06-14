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
            Route::post('/delete','App\Http\Controllers\Admin\DeviceController@delete')->name('deleteDevice');
            Route::post('/update','App\Http\Controllers\Admin\DeviceController@update')->name('updateDevice');
            Route::get('/show/{uuid}','App\Http\Controllers\Admin\DeviceController@show')->name('showDevice');
            Route::get('/show/{uuid}/sensor','App\Http\Controllers\Admin\DeviceController@addSensor')->name('addSensorDevice');
            Route::post('/save/{uuid}/sensor','App\Http\Controllers\Admin\DeviceController@saveSensor')->name('saveSensorDevice');
            Route::post('/report','App\Http\Controllers\Admin\DeviceController@report')->name('report');

        });

        Route::prefix('/sensors')->group(function (){

            Route::get('', 'App\Http\Controllers\Admin\SensorsController@index')->name('homeSensors');
            Route::get('/create', 'App\Http\Controllers\Admin\SensorsController@create')->name('createSensor');
            Route::post('/save', 'App\Http\Controllers\Admin\SensorsController@save')->name('saveSensor');
            Route::get('/show/{uuid}', 'App\Http\Controllers\Admin\SensorsController@show')->name('showSensor');

            Route::put('/update', 'App\Http\Controllers\Admin\SensorsController@update')->name('updateSensor');


        });

        Route::prefix('/directions')->group(function (){

            Route::get('', 'App\Http\Controllers\Admin\DirectionController@index')->name('homeDirection');
            Route::get('/create', 'App\Http\Controllers\Admin\DirectionController@create')->name('createDirection');
            Route::get('/show/{uuid}', 'App\Http\Controllers\Admin\DirectionController@show')->name('showDirection');
            Route::post('/save', 'App\Http\Controllers\Admin\DirectionController@save')->name('saveDirection');
            Route::post('/update', 'App\Http\Controllers\Admin\DirectionController@update')->name('updateDirection');
            Route::post('/delete', 'App\Http\Controllers\Admin\DirectionController@delete')->name('deleteDirection');
        });


        Route::prefix('/alerts')->group(function (){

            Route::get('', 'App\Http\Controllers\Admin\AlertController@index')->name('homeAlert');

        });


    });
});




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
