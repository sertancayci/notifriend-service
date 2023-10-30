<?php

namespace Database\Seeders;

use App\Models\Channels;
use App\Models\User;
use App\Models\UserChannels;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class UserChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $users = User::pluck('id')->toArray(); // Assuming you have a User model
        $channels = Channels::pluck('id')->toArray(); // Assuming you have a Channel model

        foreach (range(1, 30) as $index) { // Change 20 to the number of user-channel relationships you want to create
            UserChannels::create([
                'user_id' => $faker->randomElement($users),
                'channel_id' => $faker->randomElement($channels),
                'is_admin' => $faker->boolean(20), // 20% chance of being an admin, adjust as needed
                'joined_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
