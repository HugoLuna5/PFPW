<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeSensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'nombre',
        'description'
    ];

}
