<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\RecruitmentFinished;
use App\Listeners\ProcessApplicationsListener;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // if (!app()->has('recruitment_finished')) {
        //     // Oznaczenie, że event został już wywołany
        //     app()->instance('recruitment_finished', true);

        //     // Wywołanie eventu RecruitmentFinished
        //     Event::dispatch(new RecruitmentFinished());

        //     // Rejestracja listenera dla eventu
        //     Event::listen(RecruitmentFinished::class, ProcessApplicationsListener::class);
        // }
    }
}
