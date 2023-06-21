<?php

namespace App\Services;

use App\Models\Application;
use App\Models\Profile;
use Carbon\Carbon;
use App\Events\ApplicationUpdated;

class RecruitmentService
{
    public function processApplications()
    {
        $profiles = Profile::where('end_date', '<=', Carbon::now())
            ->where('places', '>', 0)
            ->get();

        foreach ($profiles as $profile) {
            $applications = Application::where('profile_id', $profile->id)
                ->orderBy('score', 'desc')
                ->take($profile->places)
                ->get();

            foreach ($applications as $application) {
                $this->markApplicationAsQualified($application);
            }
        }
    }

    public function markApplicationAsQualified(Application $application)
    {
        $application->is_qualified = 1;
        $application->save();
    }
}
