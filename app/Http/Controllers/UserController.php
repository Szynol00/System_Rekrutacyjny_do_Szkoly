<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Candidate;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        // Logika pobierania wszystkich użytkowników
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        // Logika pobierania i wyświetlania użytkownika o określonym ID
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        $user = new User();
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->email = $validatedData['email'];

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Użytkownik został dodany.');
    }



    public function edit($id)
    {

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $candidate = $user->candidate;

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:400', // 400 KB
            'math_score' => 'required|numeric|min:0|max:100',
            'polish_score' => 'required|numeric|min:0|max:100',
            'english_score' => 'required|numeric|min:0|max:100',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('img', 'public');
            $user->photo = $photoPath;
        }

        $user->save();

        $candidate->candidate_index = Candidate::generateUniqueCandidateIndex();
        $candidate->mathematics_score = $request->input('math_score');
        $candidate->polish_score = $request->input('polish_score');
        $candidate->english_score = $request->input('english_score');
        $candidate->save();

        return redirect()->route('admin.users.index')->with('success', 'Użytkownik został zaktualizowany.');
    }



    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $candidate = $user->candidate;

        if ($candidate) {
            // Usuwanie powiązanych aplikacji
            $candidate->applications()->delete();

            // Usuwanie kandydata
            $candidate->delete();
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Użytkownik został usunięty.');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $candidate = $user->candidate;

        if (!$candidate) {
            $candidate = new Candidate();
            $candidate->user_id = $user->id;
        }

        $candidate->candidate_index = Candidate::generateUniqueCandidateIndex();
        $candidate->mathematics_score = $request->input('mathematics_score');
        $candidate->polish_score = $request->input('polish_score');
        $candidate->english_score = $request->input('english_score');
        $candidate->save();



        return redirect()->back()->with('success', 'Wyniki egzaminów zostały zaktualizowane.');
    }
}
