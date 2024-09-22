<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TdGroup extends Model
{
    use HasFactory, SoftDeletes;

    public function schoolsession():BelongsTo
    {
        return $this->belongsTo(School_session::class);
    }

    public function cohort():BelongsTo
    {
        return $this->belongsTo(Cohort::class);
    }

    public function subscriptions():BelongsToMany
    {
        return $this->belongsToMany(Subscription::class,"student_tdgroups");
    }
}
