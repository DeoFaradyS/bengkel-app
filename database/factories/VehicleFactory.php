<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class VehicleFactory extends Factory
{
    public function definition(): array
    {
        $brands = [
            'Toyota' => ['Avanza', 'Innova', 'Rush', 'Fortuner', 'Calya'],
            'Honda'  => ['Brio', 'Jazz', 'HRV', 'CRV', 'Mobilio'],
            'Suzuki' => ['Ertiga', 'XL7', 'Ignis', 'Baleno'],
            'Daihatsu' => ['Ayla', 'Sigra', 'Terios', 'Rocky'],
            'Mitsubishi' => ['Xpander', 'Pajero', 'L300'],
        ];

        $brand = fake()->randomElement(array_keys($brands));
        $model = fake()->randomElement($brands[$brand]);

        return [
            'user_id'       => User::factory(),
            'license_plate' => strtoupper(fake()->bothify('?? #### ???')),
            'brand'         => $brand,
            'model'         => $model,
            'year'          => fake()->numberBetween(2015, 2024),
            'type'  => fake()->randomElement(['sedan', 'suv', 'mpv', 'pickup', 'truck']),
            'image'         => null,
        ];
    }
}