<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TdGroup extends Model
{
    use HasFactory, SoftDeletes;

    public function schoolsession()
    {
        return $this->belongsTo(School_session::class);
    }

    public function cohort()
    {
        return $this->belongsTo(Cohort::class);
    }
}
