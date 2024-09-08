<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    use HasFactory;

    public function school_session():BelongsTo
    {
        return $this->belongsTo(School_session::class);
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
