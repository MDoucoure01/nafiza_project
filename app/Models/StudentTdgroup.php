<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentTdgroup extends Model
{
    use HasFactory;

    public function subscription():BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }

    public function group():BelongsTo
    {
        return $this->belongsTo(TdGroup::class);
    }
}
