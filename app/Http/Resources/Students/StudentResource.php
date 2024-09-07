<?php

namespace App\Http\Resources\Students;

use App\Http\Resources\COnseils\ConseilResource;
use App\Http\Resources\Users\UserResource;
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
        $userData = UserResource::make($this->user)->toArray($request);
        return array_merge($userData, [
            "conseil_id" => $this->conseil_id,
            "matricule" => $this->matricule,
            "born_date" => $this->born_date,
            "specific_desease" => $this->specific_desease,
            "allergies" => $this->allergies,
            "conseil" => ConseilResource::make($this->conseil)
        ]);
    }
}
