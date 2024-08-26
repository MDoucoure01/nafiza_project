<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School_session extends Model
{
    use HasFactory, SoftDeletes;

    public function students()
    {
        return $this->belongsToMany(Student::class, 'subscriptions');
    }

    public function cohorts()
    {
        return $this->belongsToMany(Cohort::class, 'session__cohorts', 'school_session_id', 'cohort_id');
    }

    public function groups()
    {
        return $this->hasMany(TdGroup::class);
    }
}
