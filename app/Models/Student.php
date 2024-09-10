<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function schoolsessions():BelongsToMany
    {
        return $this->belongsToMany(School_session::class, 'subscriptions');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function conseil():BelongsTo
    {
        return $this->belongsTo(Conseil::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function activeSubscription()
    {
        return $this->subscriptions()->where('is_active', 1)->first();
    }

    public function cohorts()
    {
        return $this->hasManyThrough(Cohort::class, Subscription::class);
    }
}
