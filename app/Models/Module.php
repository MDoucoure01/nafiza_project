<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    public function schoolsessions(): BelongsToMany
    {
        return $this->belongsToMany(School_session::class, 'session__modules');
    }
=======
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    use HasFactory;
>>>>>>> 4870f1f74185ceff1c20f47672c1cfce482b9871

    public function school_session():BelongsTo
    {
        return $this->belongsTo(School_session::class);
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
