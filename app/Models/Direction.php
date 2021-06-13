<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'latitude',
        'longitude',
        'street',
        'colony',
        'city',
        'state',
        'cp',
        'reference_dir',
        'direction_complete',
    ];

}
