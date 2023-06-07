<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use App\Models\Mobil;
use App\Models\Motor;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateUserDefaultSeeder::class);

        User::factory(10)->create();

        Mobil::factory(10)->create();
        Motor::factory(10)->create();
    }
}
