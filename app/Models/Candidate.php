<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generateUniqueCandidateIndex(): string
    {
        $candidateIndex = Str::random(6);

        while (self::where('candidate_index', $candidateIndex)->exists()) {
            $candidateIndex = Str::random(6);
        }

        return $candidateIndex;
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'application_profiles')
            ->withTimestamps();
    }
}
