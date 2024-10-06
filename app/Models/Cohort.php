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
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->belongsToMany(Subscription::class, 'cohort_subscriptions')
                    ->withPivot('is_actual');
=======
        return $this->belongsToMany(Subscription::class,"cohort_subscriptions")->withPivot(["is_actual"]);
>>>>>>> 21c7d2d9a87d9e0aa1264f299d7fe43999113720
=======
        return $this->belongsToMany(Subscription::class, 'cohort_subscriptions')
                    ->withPivot('is_actual');
    }

    public function seances():HasMany
    {
        return $this->hasMany(Seance::class);
>>>>>>> b253387658d9b91a5c10661875931c3e35b2d00f
    }
}
