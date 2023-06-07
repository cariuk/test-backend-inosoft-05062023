<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KendaraanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'tahun_keluaran' => $this->faker->year(),
            'warna' => $this->faker->colorName(),
            'harga' => $this->faker->randomFloat(2, 10000000, 100000000),
            'tipe' => $this->faker->randomElement(['mobil', 'motor']),
            'stok' => $this->faker->numberBetween(0, 100),
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
