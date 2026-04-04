<?php

namespace Database\Factories;

use App\Models\Sparepart;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sparepart>
 */
class SparepartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word,
            'stok' => $this->faker->numberBetween(0, 100),
            'harga' => $this->faker->numberBetween(10000, 1000000),
        ];
    }
}
