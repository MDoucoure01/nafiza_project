<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Likepost extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function posts(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
