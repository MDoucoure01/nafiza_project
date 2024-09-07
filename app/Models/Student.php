<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function schoolsessions()
    {
        return $this->belongsToMany(School_session::class, 'subscriptions');
    }

<<<<<<< HEAD
    public function user()
=======
    public function user():BelongsTo
>>>>>>> f5abbd3cf794dafa6828fdd56a12722e915c3115
    {
        return $this->belongsTo(User::class);
    }

<<<<<<< HEAD
    public function conseil()
=======
    public function conseil():BelongsTo
>>>>>>> f5abbd3cf794dafa6828fdd56a12722e915c3115
    {
        return $this->belongsTo(Conseil::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function cohorts()
    {
        return $this->hasManyThrough(Cohort::class, Subscription::class);
    }
<<<<<<< HEAD
=======

>>>>>>> f5abbd3cf794dafa6828fdd56a12722e915c3115
}
