<?php

namespace App\Http\Resources\Modules;

use App\Http\Resources\Courses\courseResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
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
            "name" => $this->name,
            "start_date" => $this->start_date,
            "end_date" => $this->end_date,
            "school_session_id" => $this->school_session_id,
            // "course" => courseResource::collection($this->courses)
        ];
    }
}
