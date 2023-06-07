<?php

namespace Database\Factories;

use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Factories\Factory;

class MotorFactory extends Factory
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
            'mesin' => $this->faker->randomFloat(2, 100, 500),
            'tipe' => $this->faker->randomElement(['matic', 'manual']),
            'tipe_suspensi' => $this->faker->randomElement(['teleskopik', 'double shockbreaker']),
        ];
    }
}
