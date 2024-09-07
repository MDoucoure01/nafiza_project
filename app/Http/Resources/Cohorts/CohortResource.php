<?php

namespace App\Http\Resources\Cohorts;

use App\Http\Resources\Subscriptions\SubscriptionResource;
use App\Http\Resources\Subscriptions\SubscriptionWithoutCohortResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CohortResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
         // Filtrer les subscriptions pour n'inclure que celles avec school_session->status == 1
         $filteredSubscriptions = $this->subscriptions->filter(function ($subscription) {
            return $subscription->school_session && $subscription->school_session->status == 1 && $subscription->is_active == true;
        });

        return [
            "id" => $this->id,
            "name" => $this->name,
            "slug" => $this->slug,
            "description" => $this->description,
            "students" => SubscriptionWithoutCohortResource::collection($filteredSubscriptions),
        ];
    }
}
