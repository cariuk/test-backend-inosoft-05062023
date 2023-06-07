<?php

namespace Database\Factories;

use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Factories\Factory;

class MobilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'kendaraan_id' => Kendaraan::factory(),
            'mesin' => $this->faker->randomFloat(2, 1000, 5000),
            'kapasitas_penumpang' => $this->faker->numberBetween(2, 10),
            'tipe' => $this->faker->randomElement(['sedan', 'mpv', 'suv', 'hatchback', 'sport']),
        ];
    }
}
