<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        "id"
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function cohort()
    {
        return $this->belongsTo(Cohort::class);
    }
}
