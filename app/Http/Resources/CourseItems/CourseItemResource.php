<?php

namespace App\Http\Resources\CourseItems;

use App\Http\Resources\Courses\courseResource;
use App\Http\Resources\Users\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseItemResource extends JsonResource
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
            "id" => $this->id,
            "course_id" => courseResource::make($this->course),
            "user_id" => UserResource::make($this->user),
            "content" => $this->content,
            "file" => $this->file,
            "image" => $this->image,
            "link" => $this->link,
            "date" => $this->created_at,
        ];
    }
}
