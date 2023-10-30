<?php

namespace Database\Seeders;

use App\Models\NotificationMessage;
use App\Models\UserChannels;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NotificationMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $userChannels = UserChannels::all(); // Assuming you have a UserChannel model

        foreach ($userChannels as $userChannel) {
            NotificationMessage::create([
                'sender_user_id' => $userChannel->user_id,
                'channel_id' => $userChannel->channel_id,
                'message' => $faker->sentence,
                'thumbnail' => $faker->imageUrl(400, 300, 'nature', true),
            ]);
        }
    }
}
