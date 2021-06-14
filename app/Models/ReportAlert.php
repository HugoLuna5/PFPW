<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportAlert extends Model
{
    use HasFactory;


    protected $fillable = [
      'uuid',
      'device_id',
      'alert_id',
      'sensor_device_id',
      'normal_value',
      'current_value',
    ];

    public function alert(){
        return $this->hasOne('App\Models\Alert', 'id','alert_id');
    }

}
