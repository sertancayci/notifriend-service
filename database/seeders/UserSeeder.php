<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) { // Change 10 to the number of users you want to create
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // You can change 'password' to the default password you want to use
                'username' => $faker->userName,
                'avatar' => $faker->imageUrl(200, 200, 'people', true),
                'status' => 'ACTIVE',
            ]);
        }
    }
}
