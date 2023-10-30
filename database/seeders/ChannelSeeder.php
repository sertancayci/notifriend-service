<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Channels;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $userIds = User::pluck('id')->toArray(); // Get all user IDs
        $categoryIds = Category::pluck('id')->toArray(); // Get all category IDs

        foreach (range(1, 10) as $index) { // Change 10 to the number of channels you want to create
            Channels::create([
                'user_id' => $faker->randomElement($userIds),
                'category_id' => $faker->randomElement($categoryIds),
                'title' => $faker->text(20),
                'description' => $faker->paragraph,
                'thumbnail' => $faker->imageUrl(400, 300),
                'status' => 'ACTIVE',
            ]);
        }
    }
}
