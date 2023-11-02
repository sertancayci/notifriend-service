<?php

namespace Database\Seeders;

use App\Models\NFNotification;
use App\Models\NotificationMessage;
use App\Models\UserChannels;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userChannels = UserChannels::all(); // Assuming you have a UserChannel model
        $notificationMessages = NotificationMessage::all(); // Assuming you have a NotificationMessage model

        foreach ($userChannels as $userChannel) {
            foreach ($notificationMessages as $message) {
                // Check if the sender and receiver users have the same channel_id
                if ($userChannel->channel_id == $message->channel_id) {
                    NFNotification::create([
                        'sender_user_id' => $message->sender_user_id,
                        'receiver_user_id' => $userChannel->user_id,
                        'message_id' => $message->id,
                        'is_sent' => false,
                        'is_read' => false,
                    ]);
                }
            }
        }
    }
}
