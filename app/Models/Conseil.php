<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conseil extends Model
{
    use HasFactory, SoftDeletes;


    protected $guarded = [
        'id'
    ];

    public function comite()
    {
        return $this->belongsTo(Comite::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

}
