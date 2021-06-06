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
        'value'
    ];
}
