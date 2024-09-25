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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function toArray(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        // return parent::toArray($request);
         // Filtrer les subscriptions pour n'inclure que celles avec school_session->status == 1
         $filteredSubscriptions = $this->subscriptions->filter(function ($subscription) {
            return $subscription->school_session && $subscription->school_session->status == 1 && $subscription->is_active == true && $subscription->pivot->is_actual == true;
        });

        return SubscriptionWithoutCohortResource::collection($filteredSubscriptions);
    }
}
