<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // protected $with = [
    //     'category',
    //     'tags',
    // ];


    public function usersLike(): BelongsToMany
    {
        return $this->belongsToMany(User::class,"likeposts");
    }

    public function usersComment(): BelongsToMany
    {
        return $this->belongsToMany(User::class,"commentposts")
        ->withPivot("content");
    }



}
