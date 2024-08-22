<?php

namespace App\Http\Resources\Users;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "role_id"=> $this->role_id,
            "firstname"=> $this->firstname,
            "lastname"=> $this->lastname,
            "email"=> $this->email,
            "phone"=> $this->phone,
            "address"=> $this->address,
            "status"=> $this->status,
            "specific_skills"=> $this->specific_skills,
            "profile_photo_path"=> $this->profile_photo_path
        ];

    }
}
