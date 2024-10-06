<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Professor extends Model
{
    use HasFactory;

    protected $guarded = [
        "id"
    ];

    public function schoolsessions():BelongsToMany
    {
        return $this->belongsToMany(School_session::class, 'session_professors');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function seances():HasMany
    {
        return $this->hasMany(Seance::class);
    }
}
