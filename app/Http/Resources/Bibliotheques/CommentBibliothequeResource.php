<?php

namespace App\Http\Resources\Bibliotheques;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentBibliothequeResource extends JsonResource
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
            "user_id" => $this->user_id,
            "bibliotheque_id" => $this->bibliotheque_id,
            "content" => $this->content
        ];
    }
}
