<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            'name' => 'User Default',
            'email' => 'user@default.com',
            'password' => bcrypt('12345678'),
        ];

        if (User::where('email', $data['email'])->first()) {
            return;
        } else {
            User::create($data);
        }
    }
}
