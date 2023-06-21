<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Candidate;

class CandidateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Candidate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();

        return [
            'candidate_index' => $this->generateUniqueCandidateIndex(),
            'mathematics_score' => $faker->randomFloat(2, 0, 100),
            'polish_score' => $faker->randomFloat(2, 0, 100),
            'english_score' => $faker->randomFloat(2, 0, 100),
            'user_id' => $faker->numberBetween(23, 50),
        ];
    }

    /**
     * Generate a unique candidate index.
     *
     * @return string
     */
    protected function generateUniqueCandidateIndex()
    {
        return Str::random(10);
    }
}
