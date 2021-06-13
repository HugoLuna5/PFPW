<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorDevice extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'device_id',
        'type_sensors_id',
    ];


    public function sensor(){
        return $this->hasOne('App\Models\TypeSensor','id','type_sensors_id');
    }

    public function values(){
        return $this->hasMany('App\Models\DataSensor','sensor_device_id','device_id');//->orderBy('created_at')->first();
    }


}
