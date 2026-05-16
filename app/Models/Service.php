<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
        'estimated_time',
        'price_min',
        'price_max',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
        'price_min' => 'integer',
        'price_max' => 'integer',
        'estimated_time' => 'integer',
    ];
}