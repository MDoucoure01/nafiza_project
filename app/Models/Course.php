<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [
        "id"
    ];


    public function courseItems():HasMany
    {
        return $this->hasMany(CourseItems::class);
    }


    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }


    public function courseType(): BelongsTo
    {
        return $this->belongsTo(CourseType::class);
    }
}
