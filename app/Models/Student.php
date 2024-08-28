<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function conseil()
    {
        return $this->belongsTo(Conseil::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
