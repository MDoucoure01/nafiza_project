<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use HasFactory, SoftDeletes;


    public function seance():BelongsTo
    {
        return $this->belongsTo(Seance::class);
    }

    public function student():BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
