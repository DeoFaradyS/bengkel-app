<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // ⬅️ tambahin ini

class Sparepart extends Model
{
    use HasFactory; // ⬅️ WAJIB BANGET

    protected $fillable = [
        'nama',
        'stok',
        'harga',
    ];
}