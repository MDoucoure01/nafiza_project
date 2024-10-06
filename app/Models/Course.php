<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        "id"
    ];



    public function courseItems(): HasMany

    {
        return $this->hasMany(CourseItems::class);
    }


    // public function module(): BelongsTo
    // {
    //     return $this->belongsTo(Module::class);
    // }

    public function seances():HasMany
    {
        return $this->hasMany(Seance::class);
    }

    public function courseType(): BelongsTo
    {
        return $this->belongsTo(CourseType::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
