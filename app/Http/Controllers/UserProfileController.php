<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the user profile.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $user = auth()->user();
        $candidate = $user->candidate;
        $applications = [];
        $profile = null;

        if ($candidate) {
            $applications = Application::where('candidate_id', $candidate->id)->get();
        }

        return view('profile.user-profile', compact('candidate', 'applications', 'profile'));
    }

    /**
     * Show the form for editing the user profile.
     *
     * @return Renderable
     */
    public function edit(): Renderable
    {
        $user = auth()->user();
        $candidate = $user->candidate;

        return view('profile.edit', compact('user', 'candidate'));
    }

    /**
     * Update the user profile.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();
        $candidate = $user->candidate;

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:400', // 400 KB
            'mathematics_score' => ['numeric', 'between:0,100'],
            'polish_score' => ['numeric', 'between:0,100'],
            'english_score' => ['numeric', 'between:0,100'],
        ]);


        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        }

        if ($user) {
            $user->fill([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
            ]);

            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('img', 'public');
                $user->photo = $photoPath;
            }

            $user->save();
        }

        if ($candidate) {
            $isCandidateUpdated = false;

            if (!is_null($request->input('mathematics_score'))) {
                $candidate->mathematics_score = $request->input('mathematics_score');
                $isCandidateUpdated = true;
            }

            if (!is_null($request->input('polish_score'))) {
                $candidate->polish_score = $request->input('polish_score');
                $isCandidateUpdated = true;
            }

            if (!is_null($request->input('english_score'))) {
                $candidate->english_score = $request->input('english_score');
                $isCandidateUpdated = true;
            }

            if ($isCandidateUpdated) {
                $candidate->save();
            }
        }

        if ($user || $isCandidateUpdated) {
            return redirect()->route('user-profile')->with('success', 'Profil został zaktualizowany.');
        }

        return redirect()->route('user-profile')->with('success', 'Nie dokonano żadnych zmian w profilu.');
    }


    public function showUserProfile()
    {
        $user = auth()->user();

        if ($user->role_id == 2) {
            $applications = Application::where('candidate_id', $user->id)->get();
            return view('user-profile', compact('user', 'applications'));
        }

        return view('user-profile', compact('user'));
    }
}
