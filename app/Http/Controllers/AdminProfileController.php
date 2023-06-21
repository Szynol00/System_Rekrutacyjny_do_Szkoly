<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Events\RecruitmentFinished;
use Illuminate\Database\QueryException;
use App\Models\Application;

class AdminProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();

        return view('admin.profiles.index', ['profiles' => $profiles]);
    }

    public function show($id)
    {
        $profile = Profile::find($id);


        return view('admin.profiles.show', ['profile' => $profile]);
    }

    public function create()
    {
        return view('admin.profiles.create');
    }


    public function store(Request $request)
    {
        // Walidacja danych wejściowych
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'mathematics_multiplier' => 'required|numeric',
            'polish_multiplier' => 'required|numeric',
            'english_multiplier' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'places' => 'required|integer',
        ]);

        $profile = new Profile;
        $profile->name = $validatedData['name'];
        $profile->description = $validatedData['description'];
        $profile->mathematics_multiplier = $validatedData['mathematics_multiplier'];
        $profile->polish_multiplier = $validatedData['polish_multiplier'];
        $profile->english_multiplier = $validatedData['english_multiplier'];
        $profile->start_date = $validatedData['start_date'];
        $profile->end_date = $validatedData['end_date'];
        $profile->places = $validatedData['places'];

        $profile->save();

        return redirect()->route('admin.profiles.index')->with('success', 'Profil został dodany.');
    }


    public function edit($id)
    {
        $profile = Profile::find($id);

        return view('admin.profiles.edit', ['profile' => $profile]);
    }

    public function update(Request $request, $id)
    {
        // Walidacja danych wejściowych
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'mathematics_multiplier' => 'required|numeric',
            'polish_multiplier' => 'required|numeric',
            'english_multiplier' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'places' => 'required|integer',
        ]);

        $profile = Profile::find($id);

        // Zaktualizowanie właściwości profilu na podstawie danych z formularza
        $profile->name = $request->name;
        $profile->description = $request->description;
        $profile->mathematics_multiplier = $request->mathematics_multiplier;
        $profile->polish_multiplier = $request->polish_multiplier;
        $profile->english_multiplier = $request->english_multiplier;
        $profile->start_date = $request->start_date;
        $profile->end_date = $request->end_date;
        $profile->places = $request->places;

        $profile->save();

        event(new RecruitmentFinished()); // Wywołanie eventu RecruitmentFinished

        return redirect()->route('admin.profiles.index')->with('success', 'Profil został zaktualizowany.');
    }


    public function destroy($id)
    {
        try {
            $profile = Profile::findOrFail($id);

            // Usuwanie powiązanych rekordów z tabeli applications
            Application::where('profile_id', $profile->id)->delete();

            $profile->delete();

            return redirect()->route('admin.profiles.index')->with('success', 'Profil został pomyślnie usunięty.');
        } catch (QueryException $e) {
            return redirect()->route('admin.profiles.index')->with('error', 'Wystąpił błąd podczas usuwania profilu.');
        }
    }
}
