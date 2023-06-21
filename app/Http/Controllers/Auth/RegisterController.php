<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->candidate()->create([
            'candidate_index' => $this->generateUniqueCandidateIndex(),
            'mathematics_score' => 0,
            'polish_score' => 0,
            'english_score' => 0,
        ]);

        return $user;
    }


    private function generateUniqueCandidateIndex(): string
    {
        $candidateIndex = Str::random(6);

        // Sprawdzamy, czy wygenerowany indeks jest unikalny
        while (Candidate::where('candidate_index', $candidateIndex)->exists()) {
            $candidateIndex = Str::random(6);
        }

        return $candidateIndex;
    }
}
