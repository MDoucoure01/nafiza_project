<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class School_session extends Model
{
    use HasFactory, SoftDeletes;

    public function students():BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'subscriptions');
    }

    public function professors():BelongsToMany
    {
        return $this->belongsToMany(Professor::class, 'session_professors');
    }

    public function cohorts()
    {
        return $this->belongsToMany(Cohort::class, 'session__cohorts');
    }

    public function groups()
    {
        return $this->hasMany(TdGroup::class);
    }
}
