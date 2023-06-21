<?php

namespace App\Listeners;

use App\Services\RecruitmentService;
use App\Events\RecruitmentFinished;

class ProcessApplicationsListener
{
    protected $recruitmentService;

    public function __construct(RecruitmentService $recruitmentService)
    {
        $this->recruitmentService = $recruitmentService;
    }

    public function handle(RecruitmentFinished $event)
    {
        $this->recruitmentService->processApplications();
    }
}
