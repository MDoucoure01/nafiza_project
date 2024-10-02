<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseType extends Model
{
    use HasFactory, SoftDeletes;

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }


    public function modules():HasMany
    {
        return $this->hasMany(Module::class);
    }
}
