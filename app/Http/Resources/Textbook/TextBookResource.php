<?php

namespace App\Http\Resources\Textbook;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TextBookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            "date" => $this->created_at->format('Y-m-d'),
            "module" => $this->course->module->name,
            "course" => $this->course->title,
            "content" => $this->content
        ];
    }
}
