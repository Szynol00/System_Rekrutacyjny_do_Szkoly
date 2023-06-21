<?php

namespace App\Services;

use App\Models\Application;

class ApplicationService
{
    public function updateApplication($id, array $data)
    {
        $application = Application::with('candidate', 'profile')->findOrFail($id);

        $application->withoutEvents(function () use ($application, $data) {
            $application->update($data);
        });

        $this->calculateScore($application);

        return $application;
    }

    public function calculateScore(Application $application)
    {
        $candidate = $application->candidate;
        $profile = $application->profile;

        $isPhotoValid = $application->is_photo_valid;
        $paymentStatus = $application->payment_status;

        $score = 0;

        if ($isPhotoValid && $paymentStatus) {
            $score = ($candidate->mathematics_score * $profile->mathematics_multiplier)
                + ($candidate->polish_score * $profile->polish_multiplier)
                + ($candidate->english_score * $profile->english_multiplier);
        }

        $application->score = $score;
        $application->save();
    }
}
