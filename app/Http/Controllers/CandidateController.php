<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_index',
        'mathematics_score',
        'polish_score',
        'english_score',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
