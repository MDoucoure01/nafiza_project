<?php

namespace App\Http\Resources\Students;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            "user_id" => $this->user_id,
            "conseil_id" => $this->conseil_id,
            "matricule" => $this->matricule,
            "born_date" => $this->born_date,
            "specific_desease" => $this->specific_desease,
            "allergies" => $this->allergies
        ];
    }
}
