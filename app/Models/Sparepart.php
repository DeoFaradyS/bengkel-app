<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // ⬅️ tambahin ini

class Sparepart extends Model
{
    use HasFactory; // ⬅️ WAJIB BANGET

    protected $fillable = [
        'name',
        'category',
        'part_number',
        'brand',
        'stock',
        'price',
        'unit',
        'condition',
        'stock_minimum',
        'status',
        'description',
    ];
}