<?php

namespace App\Http\Resources\Posts;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "id"=> $this->id,
            "user_id"=> $this->user_id,
            "media_link"=> $this->media_link,
            "visibility"=> $this->visibility,
            "description"=> $this->description,
            "title"=> $this->title,
        ];
    }
}
