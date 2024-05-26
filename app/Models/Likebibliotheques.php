<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Likebibliotheques extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function bibliotheques(): BelongsTo
    {
        return $this->belongsTo(Bibliotheque::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
