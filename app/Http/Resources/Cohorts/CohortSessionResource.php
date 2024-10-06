<?php

namespace App\Http\Resources\Cohorts;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CohortSessionResource extends JsonResource
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
            "slug" => $this->slug,
            "start_date" => $this->start_date,
            "end_date" => $this->end_date,
            "status" => $this->status,
            "description" => $this->description,
            "cohort" => $this->cohorts->makeHidden(["pivot","deleted_at","created_at","updated_at"])
        ];

    }
}
