<?php

namespace App\Http\Resources\V1\Channel;

use App\Http\Resources\V1\Category\CategoryCollection;
use App\Http\Resources\V1\User\UserCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChannelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        $data = [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'title' => $this->title,
            'description' => $this->description,
            'thumbnail' => $this->thumbnail,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

        $data["category"] = new CategoryCollection($this->category()->get());
        $data["owner"] = new UserCollection($this->owner()->get());

        return $data;
    }
}
