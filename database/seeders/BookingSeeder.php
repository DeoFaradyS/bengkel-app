<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        // ambil user (biar relasi aman)
        $users = User::all();

        DB::table('bookings')->insert([
            [
                'user_id' => $users[1]->id, // John
                'vehicle_type' => 'Motor - Honda Beat',
                'booking_date' => now()->addDays(1)->toDateString(),
                'booking_time' => '09:00:00',
                'complaint' => 'Mesin berisik',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $users[2]->id, // Jane
                'vehicle_type' => 'Motor - Yamaha NMAX',
                'booking_date' => now()->addDays(2)->toDateString(),
                'booking_time' => '11:00:00',
                'complaint' => 'Rem kurang pakem',
                'status' => 'process',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $users[1]->id,
                'vehicle_type' => 'Mobil - Avanza',
                'booking_date' => now()->addDays(3)->toDateString(),
                'booking_time' => '14:00:00',
                'complaint' => 'AC tidak dingin',
                'status' => 'done',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}