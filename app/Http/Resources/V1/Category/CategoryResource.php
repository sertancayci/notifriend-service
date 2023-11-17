<?php

namespace App\Http\Resources\V1\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status,
            'thumbnail' => $this->thumbnail,
            'color' => $this->color,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

}
