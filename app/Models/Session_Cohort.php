<?php

namespace App\Models;

use App\Livewire\Backoffice\Schoolsessions\Cohorts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session_Cohort extends Model
{
    use HasFactory, SoftDeletes;

    public function modules():HasMany
    {
        return $this->hasMany(Module::class);
    }

    public function cohort(): BelongsTo
    {
        return $this->belongsTo(Cohorts::class);
    }

    public function session_cohort(): BelongsTo
    {
        return $this->belongsTo(Session_Cohort::class);
    }
}
