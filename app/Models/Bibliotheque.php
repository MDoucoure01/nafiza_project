<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bibliotheque extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        "id",
        'created_at',
        'updated_at'
    ];



    // protected $with = [
    //     'category',
    //     'tags',
    // ];


    public function usersLike(): BelongsToMany
    {
        return $this->belongsToMany(User::class, "likebibliotheques");
    }

    public function usersComment(): BelongsToMany
    {
        return $this->belongsToMany(User::class, "commentbibliotheques")
            ->withPivot("content");
    }
}
