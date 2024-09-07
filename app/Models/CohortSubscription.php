<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CohortSubscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        "id"
    ];

    public function subscription():BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }

    public function cohort():BelongsTo
    {
        return $this->belongsTo(Cohort::class);
    }
}
