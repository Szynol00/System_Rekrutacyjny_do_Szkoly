<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Candidate;
use App\Models\Profile;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function apply(Request $request, $profileId)
    {
        $validatedData = $request->validate([]);

        $existingApplication = Application::where('profile_id', $profileId)
            ->where('candidate_id', auth()->user()->candidate->id)
            ->first();

        if ($existingApplication) {
            return redirect()->route('user-profile')->with('error', 'Już złożyłeś aplikację na ten kierunek.');
        }

        // Tworzenie nowego rekordu
        $application = new Application;
        $application->profile_id = $profileId;
        $application->candidate_id = auth()->user()->candidate->id;
        $application->submitted_at = now();
        $application->save();

        return redirect()->route('user-profile')->with('success', 'Aplikacja została złożona.');
    }
}
