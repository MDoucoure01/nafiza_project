<?php

namespace App\Http\Resources\user;

use App\Traits\SlugTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    use SlugTrait;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "id"=> $this->encodeSlug($this->id, $this->id_unknown),
            "id_user"=> $this->id,
            "fisrtname"=> $this->firstname,
            "lastname"=> $this->lastname,
            "isActive" => $this->isActive ?? true,
            "email"=> $this->email,
            "profil"=> $this->profil,
            "phone"=> $this->phone,
            "pseudo"=> $this->pseudo,
            "date_of_birth"=> $this->date_of_birth,
            "id_unknown"=> $this->id_unknown,
        ];
    }
}
