<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'vehicle_type',
        'booking_date',
        'booking_time',
        'complaint',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}