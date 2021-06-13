<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'nombre',
        'token',
        'direction_id'
    ];


    public function direction(){
        return $this->hasOne('App\Models\Direction','id','direction_id');
    }

    public function sensors(){
        return $this->hasMany('App\Models\SensorDevice','device_id','id');
    }


}
