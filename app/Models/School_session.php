<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function cohorts(): BelongsToMany
    {
        return $this->belongsToMany(Cohort::class, 'session__cohorts');
    }

    public function modules(): BelongsToMany
    {
        return $this->belongsToMany(Module::class, 'session_modules', 'school_session_id', 'module_id');
    }

    public function groups(): HasMany
    {
        return $this->hasMany(TdGroup::class);
    }
}
