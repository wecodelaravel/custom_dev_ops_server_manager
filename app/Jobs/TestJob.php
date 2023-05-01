<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
 
    protected $url;

    /**
     * Create a new job instance.
     * When user initializes start new job
     * dispatch(new getAPIData($url));
     * @return void
     */
    public function __construct(Url $url)
    {
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->getData();
    }

    public function getData()
    {
        $ch = curl_init($requestUrl);
        $content = curl_exec($ch);
        $content = json_decode($content);

        // Save data
        $this->saveData($content);
    }

    public function saveData($content)
    {
        $data = new Data;
       
        $data->save();

        return;
    }
}
