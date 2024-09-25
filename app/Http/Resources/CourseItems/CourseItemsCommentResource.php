<?php

namespace App\Http\Resources\CourseItems;

use App\Http\Resources\Comments\CommentResource;
use App\Http\Resources\Courses\courseResource;
use App\Http\Resources\Users\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseItemsCommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function toArray(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        // return parent::toArray($request);
        return CommentResource::collection($this->comments);
    }

}
