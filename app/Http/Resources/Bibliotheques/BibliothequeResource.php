<?php

namespace App\Http\Resources\Bibliotheques;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BibliothequeResource extends JsonResource
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
            "id"=> $this->id,
            "user_id"=> $this->user_id,
            "author"=> $this->author,
            "title"=> $this->title,
            "Description"=> $this->Description,
            "file"=> $this->file,
            "Source"=> explode(";",$this->Source),
            "date"=> $this->date,
        ];
    }
}
