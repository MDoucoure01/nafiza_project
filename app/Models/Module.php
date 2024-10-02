<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    public function schoolsessions()
    {
        return $this->belongsToMany(School_session::class, 'session__modules');
    }

    public function courses():HasMany
=======
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    use HasFactory;

    public function school_session():BelongsTo
    {
        return $this->belongsTo(School_session::class);
    }

    public function courses(): HasMany
>>>>>>> 67d8f563f864eebad91ebe176b6702bdb7a00049
    {
        return $this->hasMany(Course::class);
    }
}
