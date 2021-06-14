<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $fillable = [
      'uuid',
      'device_id',
      'name',
      'value',
    ];


    public function device(){
        return $this->hasOne('App\Models\Device','id','device_id');
    }

}
