<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    public function schoolsessions()
    {
        return $this->belongsToMany(School_session::class, 'session__modules');
    }

    public function courses():HasMany
    {
        return $this->hasMany(Course::class);
    }
}
