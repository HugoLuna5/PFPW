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

Route::prefix('/home')->group(function (){
    Route::get('', 'App\Http\Controllers\Admin\HomeController@index')->name('homeAdmin');


    Route::prefix('/devices')->group(function (){

        Route::get('/create','App\Http\Controllers\Admin\DeviceController@create')->name('createDevice');
        Route::post('/save','App\Http\Controllers\Admin\DeviceController@save')->name('saveDevice');

    });

});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
