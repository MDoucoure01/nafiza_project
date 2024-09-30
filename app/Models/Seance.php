<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seance extends Model
{
    use HasFactory, SoftDeletes;

    public function professor():BelongsTo
    {
        return $this->belongsTo(Professor::class);
    }

    public function cohort():BelongsTo
    {
        return $this->belongsTo(Cohort::class);
    }

    public function course():BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
