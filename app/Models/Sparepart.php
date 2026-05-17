<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sparepart extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'part_number',
        'brand',
        'stock',
        'stock_minimum',
        'price',
        'unit',
        'condition',
        'status',
        'description',
    ];
}