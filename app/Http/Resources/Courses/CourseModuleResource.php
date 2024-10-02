<?php

namespace App\Http\Resources\Courses;

use App\Http\Resources\CourseItems\CourseItemResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseModuleResource extends JsonResource
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
            "course_id" => $this->id,
            "element" => $this->courseItems->makeHidden(["created_at", "updated_at","course_id","user_id"])
        ];


        // $data = [];
        // foreach ($this->courseItems as $course) {
        //     foreach ($course->courseItems as $item) {
        //         $data[] = [
        //             'module_id' => $this->id,
        //             'course_id' => $course->id,
        //             'content' => $item->content,
        //             'file' => $item->file,
        //             'image' => $item->image,
        //             'link' => $item->link,
        //         ];
        //     }
        // }

        // return $data;
    }
}
