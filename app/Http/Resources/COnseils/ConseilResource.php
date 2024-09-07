<?php

namespace App\Http\Resources\COnseils;

use App\Http\Resources\Comites\ComiteResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConseilResource extends JsonResource
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
            "comite" => ComiteResource::make($this->comite)
        ];
    }
}
