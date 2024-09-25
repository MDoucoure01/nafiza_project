<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cohort extends Model
{
    use HasFactory, SoftDeletes;

    public function schoolsessions():BelongsToMany
    {
        return $this->belongsToMany(School_session::class, 'session__cohorts');
    }


    public function groups()
    {
        return $this->hasMany(TdGroup::class);
    }

    // public function subscriptions()
    // {
    //     return $this->hasMany(Subscription::class);
    // }
    
    public function subscriptions()
    {
<<<<<<< HEAD
        return $this->belongsToMany(Subscription::class, 'cohort_subscriptions')
                    ->withPivot('is_actual');
=======
        return $this->belongsToMany(Subscription::class,"cohort_subscriptions")->withPivot(["is_actual"]);
>>>>>>> 21c7d2d9a87d9e0aa1264f299d7fe43999113720
    }
}
