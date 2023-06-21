<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Application;

class ApplicationUpdated
{
    use Dispatchable, SerializesModels;

    public $application;

    /**
     * Create a new event instance.
     *
     * @param Application $application
     * @return void
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }
}
