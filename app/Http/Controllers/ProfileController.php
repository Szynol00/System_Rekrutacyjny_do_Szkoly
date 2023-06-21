<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $profiles = Profile::all();

        return view('profiles', ['profiles' => $profiles]);
    }

    public function showProfile()
    {
        $user = auth()->user();
        $candidate = $user->candidate;

        return view('profile', compact('candidate'));
    }
}
