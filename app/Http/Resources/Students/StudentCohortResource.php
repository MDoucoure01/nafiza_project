<?php

namespace App\Http\Resources\Students;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentCohortResource extends JsonResource
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
            'id' => $this->id,
            'student_id' => $this->student_id,
            'school_session_id' => $this->school_session_id,
            'is_active' => $this->is_active,
            'cohort' => $this->activeCohort() ?? 'A' // Ajoutez la cohorte active ici
        ];
    }
}
