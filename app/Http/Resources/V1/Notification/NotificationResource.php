<?php

namespace App\Http\Resources\V1\Notification;

use App\Http\Resources\V1\NotificationMessage\NotificationMessageResource;
use App\Http\Resources\V1\User\UserCollection;
use App\Models\NotificationMessage;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'sender_user_id' => $this->sender_user_id,
            'receiver_user_id' => $this->receiver_user_id,
            'message_id' => $this->message_id,
            'is_sent' => $this->is_sent,
            'is_read' => $this->is_read,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];

        $message = NotificationMessage::where('id', $this->message_id)->first();

        $data["message"] = new NotificationMessageResource($message);

        $data["sender"] = new UserCollection($this->sender()->get());

//        $data["message"] = new NotificationMessageResource($this->message()->first());


        return $data;
    }
}
