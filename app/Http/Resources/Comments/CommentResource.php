<?php

namespace App\Http\Resources\Comments;

use App\Http\Resources\Users\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            "user" => UserResource::make($this->user),
            "course_items_id" => $this->course_items_id,
            "content" => $this->content,
            "created_at" => $this->created_at
        ];
    }
}
