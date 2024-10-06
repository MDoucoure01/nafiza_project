<?php

namespace App\Http\Resources\Courses;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class courseResource extends JsonResource
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
            "module_id" => $this->module_id,
            "course_type_id" => $this->course_type_id,
            "title" => $this->title,
            "description" => $this->description,
            "file" => $this->file
        ];
    }
}
