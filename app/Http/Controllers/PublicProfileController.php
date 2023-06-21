<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class PublicProfileControllerNew extends Controller
{
    public function index()
    {
        $profiles = Profile::all();

        return view('public.profiles.index', ['profiles' => $profiles]);
    }

    public function show($id)
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return redirect()->route('public.profiles.index')->with('error', 'Nie znaleziono profilu.');
        }

        return view('public.profiles.show', ['profile' => $profile]);
    }
}
