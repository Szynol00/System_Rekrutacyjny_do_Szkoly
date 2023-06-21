<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\RecruitmentFinished;
use App\Services\RecruitmentService;
use App\Events\ApplicationUpdated;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'submitted_at',
        'is_qualified',
        'is_photo_valid',
        'payment_status',
        'score',
    ];


    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function calculateScore()
    {
        $candidate = $this->candidate;
        $profile = $this->profile;

        $isPhotoValid = $this->is_photo_valid;
        $paymentStatus = $this->payment_status;

        if ($isPhotoValid === 1 && $paymentStatus === 1) {
            $score = ($candidate->mathematics_score * $profile->mathematics_multiplier)
                + ($candidate->polish_score * $profile->polish_multiplier)
                + ($candidate->english_score * $profile->english_multiplier);
        } else {
            $score = 0;
        }
        return $score;
    }
}
