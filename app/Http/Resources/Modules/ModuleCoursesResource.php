<?php

namespace App\Http\Resources\Modules;

use App\Http\Resources\Courses\CourseModuleResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ModuleCoursesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        // return [
        //     "module_id" => $this->id,
        //     "course_id" => CourseModuleResource::collection($this->courses)
        // ];

        $data = [];
        foreach (CourseModuleResource::collection($this->courses) as $course) {
            foreach ($course->courseItems as $item) {
                $data[] = [
                    'module_id' => $this->id,
                    'course_id' => $course->id,
                    'content' => $item->content,
                    'file' => $item->file,
                    'image' => $item->image,
                    'link' => $item->link,
                ];
            }
        }
        return $data;
    }
}
