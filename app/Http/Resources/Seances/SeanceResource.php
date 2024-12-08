<?php

namespace App\Http\Resources\Seances;

use App\Models\Course;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $course = Course::where('id', $this->course_id)->first();
        $professor = Professor::where('id', $this->professor_id)->first();
        return [
            "course" => $course->title,
            "professor" => $professor->user->firstname.' '.$professor->user->lastname,
            "replay" => $this->replay,
            "note" => $this->note,
            "date" => $this->date,
            "start_time" => $this->start_time,
            "end_time" => $this->end_time,
        ];
    }
}
