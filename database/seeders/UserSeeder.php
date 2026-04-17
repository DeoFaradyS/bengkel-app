<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'phone' => '081234567890',
                'status' => 'Aktif',
                'joined_at' => now(),
            ],
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'phone' => '081298765432',
                'status' => 'Aktif',
                'joined_at' => now()->subMonth(),
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'phone' => '081212345678',
                'status' => 'Aktif',
                'joined_at' => now()->subMonths(2),
            ],
        ];

        foreach ($users as $data) {
            User::updateOrCreate(
                ['email' => $data['email']], // cek email unik
                array_merge($data, [
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ])
            );
        }
    }
}