<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Candidate;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidates = [
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 60.50,
                'polish_score' => 90.20,
                'english_score' => 92.80,
                'user_id' => 2, // John Doe
            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 92.20,
                'polish_score' => 40.65,
                'english_score' => 92.40,
                'user_id' => 3, // Natalia Nowak
            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 80.20,
                'polish_score' => 45.65,
                'english_score' => 99.40,
                'user_id' => 4,
            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 94.20,
                'polish_score' => 46.65,
                'english_score' => 92.40,
                'user_id' => 5,
            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 92.20,
                'polish_score' => 40.65,
                'english_score' => 52.44,
                'user_id' => 6,
            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 52.20,
                'polish_score' => 42.43,
                'english_score' => 72.40,
                'user_id' => 7,
            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 42.21,
                'polish_score' => 40.65,
                'english_score' => 42.40,
                'user_id' => 8,
            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 32.20,
                'polish_score' => 50.65,
                'english_score' => 42.40,
                'user_id' => 9,
            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 62.20,
                'polish_score' => 40.65,
                'english_score' => 42.40,
                'user_id' => 10,
            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 32.20,
                'polish_score' => 40.65,
                'english_score' => 32.40,
                'user_id' => 11,
            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 92.20,
                'polish_score' => 40.65,
                'english_score' => 66.00,
                'user_id' => 12,
            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 54.20,
                'polish_score' => 65.43,
                'english_score' => 30.40,
                'user_id' => 13,
            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 100.00,
                'polish_score' => 30.65,
                'english_score' => 45.40,
                'user_id' => 14,
            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 52.20,
                'polish_score' => 40.63,
                'english_score' => 50.40,
                'user_id' => 15,
            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 62.10,
                'polish_score' => 52.25,
                'english_score' => 42.20,
                'user_id' => 16,
            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 42.20,
                'polish_score' => 45.65,
                'english_score' => 62.40,
                'user_id' => 17,
            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 52.20,
                'polish_score' => 40.65,
                'english_score' => 53.40,
                'user_id' => 18,
            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 62.20,
                'polish_score' => 40.65,
                'english_score' => 54.40,
                'user_id' => 19,
            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 72.20,
                'polish_score' => 40.65,
                'english_score' => 34.40,
                'user_id' => 20,

            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 52.20,
                'polish_score' => 54.65,
                'english_score' => 75.40,
                'user_id' => 21,

            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 52.20,
                'polish_score' => 54.65,
                'english_score' => 75.40,
                'user_id' => 22,
            ],

            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 52.20,
                'polish_score' => 54.65,
                'english_score' => 75.40,
                'user_id' => 23,
            ],
            [
                'candidate_index' => $this->generateUniqueCandidateIndex(),
                'mathematics_score' => 52.20,
                'polish_score' => 54.65,
                'english_score' => 75.40,
                'user_id' => 24,
            ],

        ];



        DB::table('candidates')->insert($candidates);
    }

    /**
     * Generate a unique candidate index.
     *
     * @return string
     */
    private function generateUniqueCandidateIndex(): string
    {
        $candidateIndex = Str::random(6);

        // Sprawdzamy, czy wygenerowany indeks jest unikalny
        while ($this->isCandidateIndexExists($candidateIndex)) {
            $candidateIndex = Str::random(6);
        }

        return $candidateIndex;
    }

    /**
     * Check if a candidate index already exists in the table.
     *
     * @param string $candidateIndex
     * @return bool
     */
    private function isCandidateIndexExists(string $candidateIndex): bool
    {
        return DB::table('candidates')->where('candidate_index', $candidateIndex)->exists();
    }
}
