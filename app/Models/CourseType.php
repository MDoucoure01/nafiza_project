<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseType extends Model
{
    use HasFactory;


    public function modules():HasMany
    {
        return $this->hasMany(Module::class);
    }
}
