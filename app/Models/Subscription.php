<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        "id"
    ];

    public function student():BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    // public function cohort():BelongsTo
    // {
    //     return $this->belongsTo(Cohort::class);
    // }

    public function cohorts():BelongsToMany
    {
        return $this->belongsToMany(Cohort::class,"cohort_subscriptions")->withPivot(["is_actual"]);
    }


    public function school_session(): BelongsTo
    {
        return $this->belongsTo(School_session::class);
    }
    
    public function activeCohort()
    {
        return $this->cohorts()->where('is_actual', true)->first();
    }

}
