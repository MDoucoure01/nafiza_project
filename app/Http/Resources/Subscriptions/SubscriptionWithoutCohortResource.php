<?php

namespace App\Http\Resources\Subscriptions;

use App\Http\Resources\SchoolSessions\SchoolSessionResource;
use App\Http\Resources\Students\StudentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionWithoutCohortResource extends JsonResource
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
            "student_id" => StudentResource::make($this->student),
            "is_active" => $this->is_active,
            "school_session" => SchoolSessionResource::make($this->school_session)
        ];
    }
}
