<?php

namespace App\Http\Controllers;
use App\Jobs\HostConfReadyCheck;
use App\Jobs\HostCaipyCheck;
use App\Jobs\HostServerCheck;
use App\Jobs\ServerExistsCheck;
use App\Jobs\CaipyIsSetupCheck;
use App\Jobs\CheckIfReadyForConfs;

use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Handle Queue Process
     */
    public function processQueue()
    {
        // $emailJob = new SendWelcomeEmail();
        // dispatch($emailJob);
    }
}
