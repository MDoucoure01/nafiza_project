<?php

namespace App\Http\Resources\Bibliotheques;

use App\Models\Likebibliotheques;
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
        $user = $request->user();
        return [
            "id" => $this->id,
            "user_id" => $this->user_id,
            "author" => $this->author,
            "title" => $this->title,
            "Description" => $this->Description,
            "file" => $this->file,
            "Source" => explode(";", $this->Source),
            "date" => $this->date,
            "covered" => $this->covered,
            // "is_liked" => Likebibliotheques::where("bibliotheque_id", $this->id)->where("user_id", 1)->first(),
            "is_liked" => $user ? Likebibliotheques::where("bibliotheque_id", $this->id)->where("user_id", $user->id)->exists() : false
        ];
    }
}
