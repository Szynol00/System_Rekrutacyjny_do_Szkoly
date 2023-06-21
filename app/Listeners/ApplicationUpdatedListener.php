<?php

namespace App\Listeners;

use App\Services\ApplicationService;
use App\Events\ApplicationUpdated;


class ApplicationUpdatedListener
{
    protected $applicationService;

    public function __construct(ApplicationService $applicationService)
    {
        $this->applicationService = $applicationService;
    }

    public function handle(ApplicationUpdated $event)
    {
        $application = $event->application;

        // Przetwarzanie zaktualizowanej aplikacji
        $this->applicationService->calculateScore($application);
    }
}
