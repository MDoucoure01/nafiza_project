<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cohort extends Model
{
    use HasFactory, SoftDeletes;

    public function schoolsessions(): BelongsToMany
    {
        return $this->belongsToMany(School_session::class, 'session__cohorts', 'cohort_id', 'school_session_id');
    }


    public function groups(): HasMany
    {
        return $this->hasMany(TdGroup::class);
    }

    // public function subscriptions()
    // {
    //     return $this->hasMany(Subscription::class);
    // }

    public function subscriptions(): BelongsToMany
    {
        return $this->belongsToMany(Subscription::class, 'cohort_subscriptions')
                    ->withPivot('is_actual');
    }

    public function seances():HasMany
    {
        return $this->hasMany(Seance::class);
    }
}
