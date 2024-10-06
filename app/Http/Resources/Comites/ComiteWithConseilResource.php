<?php

namespace App\Http\Resources\Comites;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ComiteWithConseilResource extends JsonResource
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
            "conseils" => $this->conseils->makeHidden(["deleted_at", "updated_at","comite_id", "created_at"])
        ];
    }
}
