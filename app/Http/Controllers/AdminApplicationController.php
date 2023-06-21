<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Candidate;
use App\Models\Profile;
use App\Events\ApplicationUpdated;
use App\Services\ApplicationService;
use App\Listeners\ApplicationUpdatedListener;
use Illuminate\Http\Request;

class AdminApplicationController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        $applicationsByProfile = [];

        foreach ($profiles as $profile) {
            $applicationsByProfile[$profile->name] = Application::where('profile_id', $profile->id)->get();
        }

        return view('admin.applications.index', compact('applicationsByProfile'));
    }

    public function create()
    {
        return view('admin.applications.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'submitted_at' => 'required',
            'is_qualified' => 'required|boolean',
            'is_photo_valid' => 'required|boolean',
            'payment_status' => 'required|boolean',
        ]);

        $application = new Application;
        // Ustawienie właściwości aplikacji na podstawie danych z formularza

        $application->save();

        return redirect()->route('admin.applications.index')->with('success', 'Aplikacja została dodana.');
    }

    public function show($id)
    {
        $application = Application::findOrFail($id);
        $profiles = Profile::all();
        $applicationsByProfile = [];

        foreach ($profiles as $profile) {
            $applicationsByProfile[$profile->name] = Application::where('profile_id', $profile->id)->get();
        }

        return view('admin.applications.show', compact('application', 'applicationsByProfile'));
    }


    public function edit($id)
    {
        $application = Application::findOrFail($id);

        return view('admin.applications.edit', compact('application'));
    }

    public function update(Request $request, ApplicationService $applicationService, $id)
    {
        $validatedData = $request->validate([
            'submitted_at' => 'required',
            'is_qualified' => 'required|boolean',
            'is_photo_valid' => 'required|boolean',
            'payment_status' => 'required|boolean',
        ]);

        $application = $applicationService->updateApplication($id, $validatedData);

        event(new ApplicationUpdated($application));

        return redirect()->route('admin.applications.index')->with('success', 'Aplikacja została zaktualizowana.');
    }

    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();

        return redirect()->route('admin.applications.index')->with('success', 'Aplikacja została usunięta.');
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
