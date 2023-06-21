<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Application;
use App\Services\RecruitmentService;


class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $applications = [
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 1,
                'profile_id' => 1,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 0,
                'payment_status' => 1,
                'candidate_id' => 2,
                'profile_id' => 1,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 3,
                'profile_id' => 1,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 4,
                'profile_id' => 1,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 5,
                'profile_id' => 1,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 6,
                'profile_id' => 1,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 6,
                'profile_id' => 2,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 7,
                'profile_id' => 1,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 8,
                'profile_id' => 1,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 9,
                'profile_id' => 1,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 10,
                'profile_id' => 1,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 11,
                'profile_id' => 1,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 12,
                'profile_id' => 1,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 13,
                'profile_id' => 1,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 14,
                'profile_id' => 1,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 15,
                'profile_id' => 1,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 16,
                'profile_id' => 1,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 0,
                'payment_status' => 1,
                'candidate_id' => 17,
                'profile_id' => 1,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 18,
                'profile_id' => 1,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 19,
                'profile_id' => 1,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 20,
                'profile_id' => 2,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 0,
                'payment_status' => 1,
                'candidate_id' => 21,
                'profile_id' => 2,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 0,
                'candidate_id' => 22,
                'profile_id' => 2,
            ],
            [
                'submitted_at' => now(),
                'is_qualified' => 0,
                'is_photo_valid' => 1,
                'payment_status' => 1,
                'candidate_id' => 23,
                'profile_id' => 2,
            ]



        ];

        foreach ($applications as $applicationData) {
            $application = new Application($applicationData);
            $application->calculateScore();

            $application->score = $application->calculateScore();

            $application->save();
        }

        $recruitmentService = new RecruitmentService();
        $recruitmentService->processApplications();
    }
}
