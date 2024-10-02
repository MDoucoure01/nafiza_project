<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    public function schoolsessions(): BelongsToMany
    {
        return $this->belongsToMany(School_session::class, 'session__modules');
    }

    public function school_session():BelongsTo
    {
        return $this->belongsTo(School_session::class);
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
