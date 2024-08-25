<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cohort extends Model
{
    use HasFactory, SoftDeletes;

    public function schoolsessions()
    {
        return $this->belongsToMany(School_session::class, 'session__cohorts', 'cohort_id', 'school_session_id');
    }


    public function groups()
    {
        return $this->hasMany(TdGroup::class);
    }

}
