<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Laravel\Dusk\DuskServiceProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        /**
         * Log jobs
         *
         * Job dispatched & processing
         */
        Queue::before(function (JobProcessing $event) {
            Log::info('Job ready: ' . $event->job->resolveName());
            Log::info('Job startet: ' . $event->job->resolveName());
            // $event->connectionName
            // $event->job
            // $event->job->payload()
        });

        /**
         * Log jobs
         *
         * Job processed
         */
        Queue::after(function (JobProcessed $event) {
            Log::notice('Job done: ' . $event->job->resolveName());
            // $event->connectionName
            // $event->job
            // $event->job->payload()
        });
        /**
         * Log jobs
         *
         * Job failed
         */
        Queue::failing(function ( JobFailed $event ) {
            Log::error('Job failed: ' . $event->job->resolveName() . '(' . $event->exception->getMessage() . ')');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }

    }
}
