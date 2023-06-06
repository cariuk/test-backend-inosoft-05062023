<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'output_year' => $this->faker->year(),
            'color' => $this->faker->colorName(),
            'price' => $this->faker->randomFloat(2, 1000, 100000),
            'type' => $this->faker->randomElement(['motorcycle', 'car']),
        ];
    }
}
