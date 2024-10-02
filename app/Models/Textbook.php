<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Textbook extends Model
{
    use HasFactory;
    protected $fillable = ['seance_id', 'professor_id', 'content'];

    public function seance()
    {
        return $this->belongsTo(Seance::class);
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
