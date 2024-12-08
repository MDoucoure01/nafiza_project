<?php

namespace App\Http\Resources\Transactions;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "amount" => $this->amount,
            "type" => $this->type,
            "status" => $this->status,
            "payment_method" => $this->payment_method,
            "date" => $this->date
        ];
    }
}
